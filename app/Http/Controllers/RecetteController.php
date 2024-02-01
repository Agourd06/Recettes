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
   
       return view('search', ['recipes' => $recipes, 'query' => $query]);
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
           'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
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
   public function CreateRecipe(Request $request)
   {
       $data = $request->validate([
           'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
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

       $data['user_id'] = auth()->id();
   
       Recipe::create($data);
   
       return redirect('recettePage');
   }
   


}
