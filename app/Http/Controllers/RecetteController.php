<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RecetteController extends Controller
{

   public function search(Request $request)
   {
      $query = $request->input('search');

      $recipes = Recipe::where('Title', 'like', '%' . $query . '%')->get();

      return view('search', ['recipes' => $recipes]);
   }

   public function DeletePost(Recipe $recipe)
   {

      if (auth()->user()->id !== $recipe['user_id']) {
         return redirect('recettePage');
      }
      $recipe->delete();
      return redirect('UserRecipe');
   }

   public function ConfirmeEdit(Recipe $recipe, Request $request)
   {
      if (auth()->user()->id !== $recipe->user_id) {
         return redirect('recettePage');
      }

      $data = $request->validate([
         //   'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
         'Title' => 'required',
         'Desc' => 'required'
      ]);
      if ($request->hasFile('image')) {
         $file = $request->file('image');
         $pictureName = time() . '.' . $file->extension();
         $file->storeAs('public/image', $pictureName);
         $data['image'] = $pictureName;
      }
      $data['Title'] = strip_tags($data['Title']);
      $data['Desc'] = strip_tags($data['Desc']);

      $recipe->update($data);
      return redirect('UserRecipe');
   }

   public function EditedRecipe(Recipe $recipe)
   {
      if (auth()->user()->id !== $recipe['user_id']) {
         return redirect('recettePage');
      }
      return view('EditRecipe', ['recipe' => $recipe]);
   }
   public function createRecipe(Request $request)
   {
      $request->validate([
         'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
         'Title' => 'required',
         'Desc' => 'required',
     ], [
         'image.required' => 'The image is required.',
         'image.image' => 'The file must be an image.',
         'image.mimes' => 'The image must be of type: jpeg, png, jpg, gif, or webp.',
         'image.max' => 'The image must not be larger than 2048 kilobytes.',
         'Title.required' => 'The Title is required.',
         'Desc.required' => 'The description is required.',
     ]);
   
       $data = $request->all();
   
       if ($request->hasFile('image')) {
           $file = $request->file('image');
           $pictureName = time() . '.' . $file->extension();
           $file->storeAs('public/image', $pictureName);
           $data['image'] = $pictureName;
       }
   
       $data['Title'] = strip_tags($data['Title']);
       $data['Desc'] = strip_tags($data['Desc']);
       $data['user_id'] = auth()->id();
   
       try {
           Recipe::create($data);
           return redirect('recettePage');
       } catch (\Exception $e) {
           return redirect('/recettePage')->withErrors(['Invalid credentials']);
       }
   }
   
}
