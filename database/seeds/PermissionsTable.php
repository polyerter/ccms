<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            /* settings */
            [
                'name' => 'settings-list',
                'parent' => '0',
                'display_name' => 'Просмотр настроек',
                'description' => ''
            ],

            /* users */
            [
                'name' => 'user-list',
                'parent' => '0',
                'display_name' => 'Просмотр пользователей',
                'description' => ''
            ],
            /* adminrow */
            [
                'name' => 'adminrow-list',
                'parent' => '0',
                'display_name' => 'Управление очередью в админке',
                'description' => ''
            ],
            /*news*/
            [
                'name' => 'news-list',
                'parent' => '0',
                'display_name' => 'Просмотр новостей в админке',
                'description' => ''
            ],
//            категории в админке
            [
                'name' => 'category-list',
                'parent' => '0',
                'display_name' => 'Просмотр категорий в админке',
                'description' => ''
            ],
            [
                'name' => 'meta-list',
                'parent' => '0',
                'display_name' => 'Просмотр меток в админке',
                'description' => ''
            ],
            [
                'name' => 'clientpays-list',
                'parent' => '0',
                'display_name' => 'Просмотр платежей в личном кабинете пайщика',
                'description' => ''
            ],
            [
                'name' => 'row-list',
                'parent' => '0',
                'display_name' => 'Просмотр очереди в личном кабинете пайщика',
                'description' => ''
            ],
            /* child*/
            [
                'name' => 'settings-add',
                'parent' => '1',
                'display_name' => 'Добавление настроек',
                'description' => ''
            ],
            [
                'name' => 'settings-edit',
                'parent' => '1',
                'display_name' => 'Редактировать настройки',
                'description' => ''
            ],
            [
                'name' => 'settings-delete',
                'parent' => '1',
                'display_name' => 'Удалить настройки',
                'description' => ''
            ],
            [
                'name' => 'user-add',
                'parent' => '2',
                'display_name' => 'Добавление пользователя',
                'description' => ''
            ],
            [
                'name' => 'user-edit',
                'parent' => '2',
                'display_name' => 'Редактировать пользователя',
                'description' => ''
            ],
            [
                'name' => 'user-delete',
                'parent' => '2',
                'display_name' => 'Удалить пользователя',
                'description' => ''
            ],
            [
                'name' => 'user-show',
                'parent' => '2',
                'display_name' => 'View user',
                'description' => ''
            ],
            [
                'name' => 'user-addpays',
                'parent' => '2',
                'display_name' => 'Добавление платежей пользователю',
                'description' => ''
            ],
            [
                'name' => 'news-add',
                'parent' => '3',
                'display_name' => 'Добавление новостей',
                'description' => ''
            ],
            [
                'name' => 'news-delete',
                'parent' => '3',
                'display_name' => 'Удаление новостей',
                'description' => ''
            ],
            [
                'name' => 'cat-add',
                'parent' => '4',
                'display_name' => 'Добавление категории',
                'description' => ''
            ],
            [
                'name' => 'cat-delete',
                'parent' => '4',
                'display_name' => 'Удаление категории',
                'description' => ''
            ],
            [
                'name' => 'meta-add',
                'parent' => '5',
                'display_name' => 'Добавление метки',
                'description' => ''
            ],
            [
                'name' => 'meta-delete',
                'parent' => '5',
                'display_name' => 'Удаление метки',
                'description' => ''
            ],
        ];
        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
