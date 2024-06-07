<?php
namespace App\Http\Controllers;

use App\Models\FashionRecommendation;
use App\Models\Image as ImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use OpenAI\Laravel\Facades\OpenAI;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class FashionRecommendationController extends Controller
{
    public function showUploadForm()
    {
        return view('fashion.upload');
    }

    public function recommend(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480', // 20MBまで許可
        ]);

        $imageFile = $request->file('image');
        $path = $imageFile->store('uploads', 'public');

        $url = Storage::url($path);

        $imageRecord = ImageModel::create([
            'user_id' => Auth::id(),
            'url' => $url,
        ]);

        $imageDescription = $this->describeImage($path);

        $recommendationData = $this->getFashionRecommendationFromAI($imageDescription);

        FashionRecommendation::create([
            'user_id' => Auth::id(),
            'image_id' => $imageRecord->id,
            'recommendation' => $recommendationData['text'],
            'image_url' => $recommendationData['image_url'],
        ]);

        return redirect()->route('fashion.results', ['image' => $imageRecord->id]);
    }

    public function showResults(ImageModel $image)
    {
        $recommendations = FashionRecommendation::where('image_id', $image->id)->get();
        return view('fashion.results', compact('image', 'recommendations'));
    }

    private function describeImage($imagePath)
    {
        $imageAnnotator = new ImageAnnotatorClient([
            'credentials' => storage_path('app/google-credentials.json')
        ]);

        $image = file_get_contents(storage_path('app/public/' . $imagePath));
        $response = $imageAnnotator->labelDetection($image);
        $labels = $response->getLabelAnnotations();

        $descriptions = [];
        foreach ($labels as $label) {
            $descriptions[] = $label->getDescription();
        }

        $imageAnnotator->close();

        return implode(', ', $descriptions);
    }

    private function getFashionRecommendationFromAI($imageDescription)
    {
        $textResponse = OpenAI::chat()->create([
            'model' => 'gpt-4-1106-vision-preview',
            'messages' => [
                ['role' => 'user', 'content' => '次の説明に基づいてファッションコーディネートを提案してください: ' . $imageDescription],
            ],
        ]);

        $recommendationText = $textResponse->choices[0]->message->content;

        $imageResponse = OpenAI::images()->create([
            'prompt' => '次の説明に基づいてファッションコーディネートの画像を生成してください: ' . $imageDescription,
            'n' => 1,
            'size' => '512x512',
        ]);

        $generatedImageUrl = $imageResponse['data'][0]['url'];

        return [
            'text' => $recommendationText,
            'image_url' => $generatedImageUrl,
        ];
    }
    public function dashboard()
{
    $recommendations = FashionRecommendation::where('user_id', Auth::id())
                                            ->orderBy('created_at', 'desc')
                                            ->get();

    return view('dashboard', compact('recommendations'));
}

}




