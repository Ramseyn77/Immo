@extends('aip.layouts.app')

@section('content')
    <div class="flex justify-center items-center mt-10 ">
        <div class="flex flex-col mt-6 space-y-6 bg-white shadow-lg w-[50%] ">
            <div class="text-blue-500 mb-4 font-bold text-3xl flex justify-center items-center">University*</div>
            <div class="flex flex-col justify-center items-center gap-y-2  ">
                <div class="py-2 w-[100%] h-[10%] px-3 flex space-x-6 justify-center items-center  border-b-2 border-black-600 ">
                    <div class="text-black font-bold text-1xl">Name :</div>
                    <div class="text-gray-500 text-sm translate-y-[5%] ">{{$university->name}}</div>
                </div>
                <div class="py-2 w-[100%] h-[10%] px-3 flex space-x-6 justify-center items-center  border-b-2 border-black-600 ">
                    <div class="text-black font-bold text-1xl">Email :</div>
                    <div class="text-gray-500 text-sm translate-y-[5%] ">{{$university->email}}</div>
                </div>
                <div class="py-2 w-[100%] h-[10%] px-3 flex space-x-6 justify-center items-center  border-b-2 border-black-600 ">
                    <div class="text-black font-bold text-1xl">Recteur :</div>
                    <div class="text-gray-500 text-sm translate-y-[5%] ">{{$university->rectorName}}</div>
                </div>
                <div class="py-2 w-[100%] h-[10%] px-3 flex space-x-6 justify-center items-center  border-b-2 border-black-600 ">
                    <div class="text-black font-bold text-1xl">Adresse :</div>
                    <div class="text-gray-500 text-sm translate-y-[5%] ">{{$university->adress}}</div>
                </div>
                <div class="py-2 w-[100%] h-[10%] px-3 flex space-x-6 justify-center items-center  border-b-2 border-black-600 ">
                    <div class="text-black font-bold text-1xl">Tel :</div>
                    <div class="text-gray-500 text-sm translate-y-[5%] ">{{$university->telephone}}</div>
                </div>
                <div class="py-2 w-[100%] h-[10%] px-3 flex space-x-6 justify-center items-center  border-b-2 border-black-600 ">
                    <div class="text-black font-bold text-1xl">Agent Comptable :</div>
                    <div class="text-gray-500 text-sm translate-y-[5%] ">{{$university->comptName}}</div>
                </div>
                <div class="py-2 w-[100%] h-[10%] px-3 flex space-x-6 justify-center items-center  border-b-2 border-black-600 ">
                    <div class="text-black font-bold text-1xl">Ville :</div>
                    <div class="text-gray-500 text-sm translate-y-[5%] ">{{$university->city}}</div>
                </div>
                <div class="py-2 w-[100%] h-[10%] px-3 flex space-x-6 justify-center items-center  border-b-2 border-black-600 ">
                    <div class="text-black font-bold text-1xl">Site Web :</div>
                    <div class="text-sm translate-y-[5%] text-blue-400">{{$university->website}}</div>
                </div>
            </div>
        </div>   
    </div>
@endsection