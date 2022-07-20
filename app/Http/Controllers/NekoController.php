<?php

namespace App\Http\Controllers;

use App\Models\Neko;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NekoController extends Controller
{
    // Show all cats
    public function index() {
        return view('nekos.index', [
            // 'headings' => 'Latest Listings',
            'nekos' => Neko::latest()->filter(request(['tag', 'nekosagashi']))->simplePaginate(8),
            // 'allImgs' => Neko::latest()->filter(request(['img']))
            'randImgs' => Neko::latest()
                            ->inRandomOrder()
                            ->limit(4)
                            ->get()
        ]);
    } 
    
    // Show one cat
    public function show(Neko $Neko) {
        return view('nekos.show', [
            'Neko' => $Neko
        ]);
    }
    
    public function create() {
        return view('nekos.create');
    }

    public function store(Request $request) {
        // dd($request->all());
        $formFields = $request->validate([
            'name' => 'required',
            // 'tags' => 'array:tags|lte:3'? Damn I really tried to make this one to work but I really have no idea tbh
            'tags' => 'string|nullable',
            'dob' => 'date|before:now',
            'desc' => 'string|min:3|max:100|required',
            'img' => 'required',
            // Below validation was very weird and basically did not work the way I imagined it would
            // 'img' => 'image|dimensions:max_height=1440|gte:50|required',
            // 'palate' => 'string|nullable',
            'palate' => 'array|nullable',
            // If you set this to array, your DB will return null, I have looked through the migration and it seems there's no way to store a value as an array

            // If you set it to boolean, make sure you return through your form 1, 0, true, false, "1", "0". "Yes" or "No" won't work. 
            'vaccines' => 'boolean|required',
            // 'vaccines' => 'string|required',
            // 'location' => 'unique:location', does not work this way because what if someone owns multiple cats
            // To use Google Map Input https://github.com/cyphercodes/location-picker/
            'location' => 'string|required',
            'breed' => 'string|nullable',
            'purrsound' => 'file|nullable'
        ]);

        if($request->hasFile('img')) {
            $formFields['img'] = $request->file('img')->store('nekoimg', 'public');
        }
        if($request->hasFile('purrsound')) {
            $formFields['purrsound'] = $request->file('purrsound')->store('purrsound', 'public');
        }

        $formFields['tags'] = Str::lower(json_encode(explode(',', $formFields['tags'])));
        $formFields['palate'] = json_encode($formFields['palate']);
        // dd($formFields['tags']);
        // dd($formFields['palate']);
        
        // WHY THE FUCK DOES THIS THING RETURN STRING AND WORKS FOR BRAD BUT NOT FOR ME. I'll just convert this piece of shit
        // $formFields['user_id'] = auth()->id();
        // This returns int but I still get the same error...
        $formFields['user_id'] = Auth::user()->id;
        // dd($formFields['user_id']);
        Neko::create($formFields);

        //'message' could also be 'error', 'success', it's basically a trigger based on page response
        return redirect('/')->with('message', "You've succesfully registered your Neko and can now view it in the Neko Cards section!");
    }

    // Update Neko
    public function edit(Neko $Neko){
        return view('nekos.edit', ['Neko' => $Neko]);
    }

    public function update(Request $request, Neko $Neko) {
        // dd($request->all());
        $formFields = $request->validate([
            'name' => 'required|max:20',
            // 'tags' => 'array:tags|lte:3'? Damn I really tried to make this one to work but I really have no idea tbh
            'tags' => 'string|nullable',
            'dob' => 'date|before:now',
            'desc' => 'string|min:3|max:100|required',
            'img' => 'max:7000',
            // Below validation was very weird and basically did not work the way I imagined it would
            // 'img' => 'image|dimensions:max_height=1440|gte:50|required',
            // 'palate' => 'string|nullable',
            'palate' => 'array|nullable',
            // If you set this to array, your DB will return null, I have looked through the migration and it seems there's no way to store a value as an array

            // If you set it to boolean, make sure you return through your form 1, 0, true, false, "1", "0". "Yes" or "No" won't work. 
            'vaccines' => 'boolean|required',
            // 'vaccines' => 'string|required',
            // 'location' => 'unique:location', does not work this way because what if someone owns multiple cats
            // To use Google Map Input https://github.com/cyphercodes/location-picker/
            'location' => 'string|required',
            'breed' => 'string|nullable',
            'purrsound' => 'file|nullable'
        ]);

        if($request->hasFile('img')) {
            $formFields['img'] = $request->file('img')->store('nekoimg', 'public');
        } else {
            $formFields['img'] = $Neko['img'];
        }
        if($request->hasFile('purrsound')) {
            $formFields['purrsound'] = $request->file('purrsound')->store('purrsound', 'public');
        } else {
            $formFields['purrsound'] = $Neko['purrsound'];
        }

        $formFields['tags'] = Str::lower(json_encode(explode(',', $formFields['tags'])));
        $formFields['palate'] = json_encode($formFields['palate']);


        $Neko->update($formFields);

        //'message' could also be 'error', 'success', it's basically a trigger based on page response
        return redirect('/')->with('message', "Neko card updated! You can view the result in the Neko Cards section!");
        // I could also use back() here and slightly tweak the response message
    }

    // Delete Neko
    public function delete(Neko $Neko){
        $Neko->delete();

        return redirect('/')->with('message', "Neko card deleted :(");
    }
}