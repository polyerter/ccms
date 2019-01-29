<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'familiya', 'imya', 'otchestvo', 'phone', 'birthday', 'housing', 'city', 'numberdoc', 'datesoc', 'datepayhous', 'role',
    ];
//    protected $dateFormat = 'M.d.Y';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * todo Проверка имеет ли пользователь определенную роль
     * @param $check
     * @return boolean
     */
    public function hasPermission($check)
    {
        return in_array($check, array_pluck($this->permissions->toArray(), 'name'));
    }
    /**
     * todo Получает название права
     * @param $name
     * @return mixed
     */
    public function getPermissionDisplayName($name)
    {
        return DB::table('permissions')->where('name', $name)->first()->display_name;
//
    }
    /**
     * todo Функция для получение прав.
     * @return boolean
     **/
    public function permissions()
    {
        return $this->belongsToMany('App\Permission', 'permission_user', 'user_id', 'permission_id');
    }

    public static function add($fields)
    {
        $users = new static;
        $users->fill($fields);
        $users->save();

        return $users;
    }

//    todo редактирование пользователя
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

// todo генерация пароля для пользователя
    public function generatePassword($password){
        if($password != null){
            $this->password = bcrypt($password);
            $this->save();
        }
    }

//todo глобальное переключение
    public function setOnInhabited()
    {
        $this->inhabited = 1;
        $this->save();
    }
    public function setOffInhabited()
    {
        $this->inhabited = 0;
        $this->save();
    }

    //todo переключатель Вкл/Выкл уже заселен:

    public function toggleInhabited($value)
    {
        if($value == 'on')
        {
            return $this->setOnInhabited();
        }

        return $this->setOffInhabited();
    }

    public function setOnStatus()
    {
        $this->status = 1;
        $this->save();
    }
    public function setOffStatus()
    {
        $this->status = 0;
        $this->save();
    }
    public function setOnArchive()
    {
        $this->archive = 1;
        $this->save();
    }
    public function setOffArchiv()
    {
        $this->archive = 0;
        $this->save();
    }
//    todo переключатель в очередь
    public function setOnRowup()
    {
        $this->rowup = 1;
        $this->save();
    }
    public function setOffRowup()
    {
        $this->rowup = 0;
        $this->save();
    }

    //todo переключатель Вкл/Выкл в архив:

    public function toggleArchive($value)
    {
        if($value == 'on')
        {
            return $this->setOnArchive();
        }

        return $this->setOffArchiv();
    }
    //todo переключатель Вкл/Выкл блокирование:

    public function toggleStatus($value)
    {
        if($value == 'on')
        {
            return $this->setOnStatus();
        }

        return $this->setOffStatus();
    }
//    todo в очередь
    public function toggleRowup($value)
    {
        if($value == 'on')
        {
            return $this->setOnRowup();
        }

        return $this->setOffRowup();
    }

//    todo мутатор для изменения поля даты
    public function setBirthdayAttribute($value)
    {
        $birthday = Carbon::parse($value)->format('Y-m-d');
        $this -> attributes['birthday'] = $birthday;
    }
//    todo мутатор для читаемой даты
    public function getBirthdayAttribute($value)
    {
        $birthday = Carbon::parse($value)->format('d.m.Y');
        return  $birthday;
    }
    public function setDatesocAttribute($value)
    {
        $data = Carbon::parse($value)->format('Y-m-d');
        $this -> attributes['Datesoc'] = $data;
    }
    public function getDatesocAttribute($value)
    {
        $data = Carbon::parse($value)->format('d.m.Y');
        return  $data;
    }
    public function setDatepayhousAttribute($value)
    {
        $data = Carbon::parse($value)->format('Y-m-d');
        $this -> attributes['datepayhous'] = $data;
    }
    public function getDatepayhousAttribute($value)
    {
        $data = Carbon::parse($value)->format('d.m.Y');
        return  $data;
    }
}
