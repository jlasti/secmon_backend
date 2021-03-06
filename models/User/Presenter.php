<?php
namespace app\models\User;

use Yii;
use app\models\BasePresenter;
use yii\helpers\Html;

class Presenter extends BasePresenter
{
	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'roles' => 'Roles assigned',
		];
	}

	/**
	 * Returns list of HTML anchors to roles for current user
	 *
	 * @return string
	 */
	public function getRoles()
	{
		$roles = array_map(function($value)
		{
			return Html::a($value, $value->links['self']);
		}, $this->entity->roles);

		return join('<br>', $roles);
	}

	/**
	 * Returns main role of current user
	 *
	 * @return string
	 */
	public function getMainRole()
	{
        return array_values($this->entity->roles)[0]['name'];
	}
}