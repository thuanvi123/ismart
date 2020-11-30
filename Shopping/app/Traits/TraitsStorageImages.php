<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait TraitsStorageImages{

    public function storageTraitUpload($request,$fieldName,$foderName){
        if($request->hasFile($fieldName)){
            $file=$request->$fieldName;
            $name =$file ->getClientOriginalName();
            $extension=str_random('20').'.'.$file->getClientOriginalExtension();
            $path = $request->file($fieldName)->storeAs('public/'.$foderName.'/'.auth()->id(),$extension);

            $dataUploadStorage=[
                'file_name'=>$name,
                'file_path'=>Storage::url($path)

            ];
            return $dataUploadStorage;
        }
        return null;
    }
    public function  storageTraitUploadMutiple($file,$foderName){
            $name =$file->getClientOriginalName();
            $extension=str_random('20').'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('public/'.$foderName.'/'.auth()->id(),$extension);
            $dataUploadStorage=[
                'file_name'=>$name,
                'file_path'=>Storage::url($path)

            ];
            return $dataUploadStorage;
    }
}

