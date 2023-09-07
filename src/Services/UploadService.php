<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;


class UploadService
{
   /* private string $targetDirectory,
    public function __construct( $targetDirectory,SluggerInterface $slugger)
    {
        $this->slugger=$slugger;
        $this->targetDirectory = $targetDirectory;

    }*/

    /*public function upload( UploadedFile $file,String $directory):string
    {

            $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $this->slugger->slug($originalFilename);
            $fileName = $safeFilename . '-' . uniqid() . '.' . $file->guessExtension();

            try {
                $file->move($this->getTargetDirectory(), $fileName);
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }

            return $fileName;

    }
    public function getTargetDirectory(): string
    {
        return $this->targetDirectory;
    }*/
}