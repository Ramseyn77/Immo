@extends('aip.layouts.app')

@section('content')

    <div class="flex-1 space-y-5 px-3 py-4 mt-3">
        <div class="text-3xl text-blue-500 flex justify-center  font-bold align-center mb-5">
            Edit Ressource
        </div>

        <form class="bg-white-500 flex flex-col justify-center items-center py-1 ml-[20%] rounded-sm" method="POST"  action="{{route('categories.update',['category' => $categorie->id])}}">
            @csrf
            @method($categorie->exists ? 'put' : 'post')
            <div class="flex w-[100%] px-3 space-x-20 mb-3">
                <div class="flex flex-col space-y-2 w-[43%]">
                    <label for="name" class="text-sm font-bold text-blue-400 ">@ Name</label>
                    <input name="name" value="{{$categorie->name}}" class="h-10 px-3 w-[100%] rounded-lg shadow-md focus:shadow focus:shadow-blue-300 focus:outline-none " type="text" placeholder="name of categorie" required>
                </div>
                {{-- <div class="flex flex-col space-y-2 w-[33%]">
                    <label for="adresse"  class="text-sm font-bold text-blue-400 ">@ Adresse</label>
                    <input name="adress" value="{{$categorie->adress}}" class="h-10 px-3 w-[100%] rounded-lg shadow-md focus:shadow focus:shadow-blue-300 focus:outline-none " type="text" placeholder="adress of categorie" required>
                </div>                
            </div>
            <div class="flex w-[100%] px-3 space-x-20 mb-3">
                <div class="flex flex-col space-y-2 w-[33%]">
                    <label for="directeur"class="text-sm font-bold text-blue-400 ">@ Recteur</label>
                    <input name="rectName" value="{{$categorie->rectorName}}" class="h-10 px-3 w-[100%] rounded-lg shadow-md focus:shadow focus:shadow-blue-300 focus:outline-none " type="text" placeholder="rector of categorie" required>
                </div>
                <div class="flex flex-col space-y-2 w-[33%]">
                    <label for="email"class="text-sm font-bold text-blue-400 ">@ Email</label>
                    <input name="email" value="{{$categorie->email}}" class="h-10 px-3 w-[100%] rounded-lg shadow-md focus:shadow focus:shadow-blue-300 focus:outline-none " type="email" placeholder="email of categorie" required>
                </div>
            </div>
            <div class="flex w-[100%] px-3 space-x-20 mb-3">
                <div class="flex flex-col space-y-2 w-[33%]">
                    <label for="tel"class="text-sm font-bold text-blue-400 ">@ Tel</label>
                    <input name="tel" value="{{$categorie->telephone}}" class="h-10 px-3 w-[100%] rounded-lg shadow-md focus:shadow focus:shadow-blue-300 focus:outline-none " type="text" placeholder="number of categorie" required>
                </div>
                <div class="flex flex-col space-y-2 w-[33%]">
                    <label for="compt"class="text-sm font-bold text-blue-400 ">@ Comptable</label>
                    <input name="comptName" value="{{$categorie->comptName}}" class="h-10 px-3 w-[100%] rounded-lg shadow-md focus:shadow focus:shadow-blue-300 focus:outline-none " type="text" placeholder="Comptable agent" required>
                </div>
            </div>
            <div class="flex w-[100%] px-3 space-x-20 mb-3">
                <div class="flex flex-col space-y-2 w-[33%]">
                    <label for="website"class="text-sm font-bold text-blue-400 ">@ Site web</label>
                    <input name="website" value="{{$categorie->website}}" class="h-10 px-3 w-[100%] rounded-lg shadow-md focus:shadow focus:shadow-blue-300 focus:outline-none " type="text" placeholder="Website of categorie">
                </div>
                <div class="flex flex-col space-y-2 w-[33%]">
                    <label for="city"class="text-sm font-bold text-blue-400 ">@ Ville</label>
                    <input name="city" value="{{$categorie->city}}" class="h-10 px-3 w-[100%] rounded-lg shadow-md focus:shadow focus:shadow-blue-300 focus:outline-none " type="text" placeholder="City" required>
                </div>
            </div> --}}
            <div class="flex justify-center items-center mt-5 translate-x-[-150%] ">
                <button type="submit" class="text-md font-bold text-white bg-green-500 px-4 py-2 border-none rounded-lg hover:bg-green-600">Modifier</button>
            </div>
        </form>
    </div>
    
@endsection