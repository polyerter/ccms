<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class Setting extends Model
{
    protected $fillable = ['sitename','siteurl', 'sitedescription', 'sitekeywords', 'amountnews', 'sitelogo', 'textoffsite', 'nameorg', 'binorg', 'adressorg', 'bankname', 'bankbik', 'bankrs', 'bankkbe', 'rowdec', 'rowam', 'userampass', 'userampay', 'userampays', 'daysoffpays'];


//    public function getSettings(){
//        return view('admin.layouts.app', ['globals' => DB::table('settings')->first()->get()]);
//    }



    // todo создание настроек

    public static function add($fields)
    {
        $setting = new static;
        $setting->fill($fields);
        $setting->save();

        return $setting;
    }

//    todo редактирование настроек
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    //todo переключатель Вкл/Выкл отображения истории платежей:
    public function setOnOffpays()
    {
        $this->offpays = 1;
        $this->save();
    }
    public function setOffOffpays()
    {
        $this->offpays = 0;
        $this->save();
    }
    public function toggleOffpays($value)
    {
        if($value == 'on')
        {
            return $this->setOnOffpays();
        }

        return $this->setOffOffpays();
    }
//todo переключатель Вкл/Выкл отображения очереди
    public function setOnOffrow()
    {
        $this->offrow = 1;
        $this->save();
    }
    public function setOffOffrow()
    {
        $this->offrow = 0;
        $this->save();
    }
    public function toggleOffrow($value)
    {
        if($value == 'on')
        {
            return $this->setOnOffrow();
        }

        return $this->setOffOffrow();
    }
//todo переключатель Выключить сайт
    public function setOnsite()
    {
        $this->offsite = 1;
        $this->save();
    }
    public function setOffsite()
    {
        $this->offsite = 0;
        $this->save();
    }
    public function toggleOnSite($value)
    {
        if($value == 'on')
        {
            return $this->setOnsite();
        }

        return $this->setOffsite();
    }

//todo удаление текущей картинки
    public function remove(){
        $this->removeImage();
        $this->delete();
    }
// todo загрузка картинки на хост
    public function uploadImage($image){

        if ($image == null) {return;}

        $this->remove();
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads/', $filename);
        $this->sitelogo = $filename;
        $this->save();
    }
//    todo удаление картинки если она есть
    public function removeImage(){
        if ($this->sitelogo != null){
            Storage::delete('uploads/' . $this->sitelogo);
        }
    }
//    todo получение адреса картинки
    public function getImage(){
        if ($this->sitelogo == null){
            return '/img/no-image.png';
        }
        return '/uploads/' . $this->sitelogo;
    }





}
