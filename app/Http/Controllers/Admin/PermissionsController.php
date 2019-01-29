<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use App\User;
use phpDocumentor\Reflection\Types\Object_;

class PermissionsController extends Controller
{
	public function getPermissions(Request $request)
	{
		$permissions = Permission::select('id', 'parent', 'name', 'display_name', 'description')->get(); // надо бы вынести в модель
		$data        = [];
		$items       = [];
		$i           = 0;
		if ($request->get('user'))
		{
			$id = $request->get('user');

			$user = User::find($id);

			foreach ($user->permissions as $permission)
			{
				$items[] = $permission->id;
			}

			foreach ($permissions as $permission)
			{
				$state           = new Object_(); // использование объектов
				$state->selected = false; // выбран ли пункт
				$state->opened   = false;
				$id              = $permission->id;

				if ($permission->parent == 0) $permission->parent = '#';  //проверка на родителя todo разобраться с дочерними элементами, выдает ошибку в построении дереве

				if (in_array($id, $items)) $state->selected = true;
				$data[$i]['id'] = $id;
				$data[$i]['parent'] = $permission->parent;  //todo разобраться с дочерними элементами, выдает ошибку в построении дереве
				$data[$i]['text']  = $permission->display_name;
				$data[$i]['state'] = $state;
				$i++;
			}
		}

		return $data;
	}

	/**
	 * Присваивание прав пользователю.
	 *
	 * @param Request $request
	 *
	 * @return int
	 */
	public function setPermissions(Request $request)
	{
		$user        = User::find($request->get('user'));
		$permissions = $request->get('data');
		$user->permissions()->detach();
		$user->permissions()->attach($permissions);

		return 1;
	}
}
