<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RecetteController extends Controller
{

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
      if (auth()->user()->id !== $recipe['user_id']) {
         return redirect('recettePage');
      }
      $data = $request->validate([
         'Title' => 'required',
         'Desc' => 'required'
      ]);

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
         'picture' => ['required','image|mimes:jpeg,png,jpg,gif|max:2048'],
         'Title' => 'required',
         'Desc' => 'required'
      ]);
      if ($request->hasFile('image')) {
         $pictureName = time() . '.' . $request->picture->extension();
         $request->picture->storeAs('public/image', $pictureName); 
         $data['image'] = $pictureName;
     }
      $data['Title'] = strip_tags($data['Title']);
      $data['Desc'] = strip_tags($data['Desc']);
      $data['user_id'] = auth()->id();
      Recipe::Create($data);
      return redirect('recettePage');
   }

   // public function save(Request $request)
   // {

   //     $request->validate([
   //         'nomCategorie' => ['required', 'min:3'],
   //         'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

   //     ]);


   //     if ($request->hasFile('picture')) {
   //         $pictureName = time() . '.' . $request->picture->extension();
   //         $request->picture->storeAs('public/photos', $pictureName); 
   //         $data['picture'] = $pictureName;
   //     }


   //     $data['nomCategorie'] = $request->nomCategorie;
   //     Categorie::create($data);

   //     return redirect()->route('categories.index')->with('success', 'Category created successfully!');
   // }
}
