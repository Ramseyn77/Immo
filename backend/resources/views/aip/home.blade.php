@extends('aip.layouts.app')

@section('content')

    <div class=" flex justify-between mt-5 w-[60%] border-b-2 border-black-300 py-1 ml-[20%] mb-6 ">
      <div class="text-3xl font-bold">List of Ressources</div>
      <div class="p-2 bg-blue-500 text-white font-bold border-0 rounded-lg "><a href=" {{route('categories.create')}} "> + New categorie </a></div>
    </div>
  @forelse ($categories as $categorie)
    <div class="flex flex-row justify-between w-[60%] py-2 ml-[20%] my-2 rounded-lg rounded-lg bg-white shadow-md space-y-6">
      <div class="w-[10%] flex justify-center items-center font-bold text-2xl border-r border-black border-solid ">
        {{$categorie->id}}
      </div>

      <div class="flex flex-col w-[88%] space-y-2 py-2 px-3">
        <div class="font-bold text-1xl mb-1 text-blue-400"> {{$categorie->name}} </div>
        <div class="text-sm mb-1">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis voluptates sit harum blanditiis, 
          aut fugit sapiente et vitae explicabo nobis ea? Architecto aliquam 
          ullam suscipit dolorum ratione nobis perferendis illum?
        </div>
        <div class="flex justify-end space-x-10 mr-2">
          <div class="py-2 px-3 text-xs bg-green-500 text-white font-bold border-0 rounded-lg "><a href="{{route('categories.show',['category' => $categorie->id])}}"> Voir plus </a></div>
          <div class="py-2 px-3 text-xs bg-yellow-500 text-white font-bold border-0 rounded-lg "><a href="{{route('categories.edit',['category' => $categorie->id])}}"> Editer </a></div>  
          <form method='post' action="{{route('categories.destroy',$categorie->id)}}">
            @csrf
            @method('delete')
            <button type='submit' class="py-2 px-3 text-xs bg-red-500 text-white font-bold border-0 rounded-lg "> Supprimer </button>
          </form>       
        </div>
      </div>
    </div>
  @empty
  <h2 class="text-2xl font-bold  ">
    Pas de liste
  </h2>
  @endforelse

@endsection

  