<?php
declare (strict_types=1);
namespace App\Modules\ImageUpload;
interface ImageManagerInterface
{
/**
*@param
*場合はその違いを気にす る必要がありません。
*\Illuminate\Http\File|\Illuminate\Http\UploadedFile string $file
*@return string
*/
public function save($file): string;
public function delete(string $name): void;
}
