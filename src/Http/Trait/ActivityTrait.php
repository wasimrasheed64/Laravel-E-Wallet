<?php

namespace Wasimrasheed\EWallet\Http\Trait;

use Illuminate\Database\Eloquent\Collection;
use Wasimrasheed\EWallet\Exception\WalletException;

trait ActivityTrait
{
    /**
     * @param array $data
     * @return mixed
     * @throws WalletException
     */
    public function createActivity(array $data): mixed
    {
        return $this->activityController->store($data);
    }


    /**
     * @param int $id
     * @return array
     * @throws WalletException
     */
    public function getActivity(int $id): array
    {
        return $this->activityController->getById($id);
    }


    /**
     * @return Collection
     */
    public function getActivities(): Collection
    {
        return $this->activityController->getAll();
    }

    /**
     * @param int $id
     * @param array $data
     * @return string
     * @throws WalletException
     */
    public function updateActivity(int $id, array $data): string
    {
        $this->activityController->update($id, $data);
        return 'Activity updated successfully';
    }


    /**
     * @param int $id
     * @return string
     * @throws WalletException
     */
    public function deleteActivity(int $id): string
    {
        $this->activityController->delete($id);
        return 'Activity deleted successfully';

    }


    /**
     * @param $item
     * @param $column
     * @return array
     * @throws WalletException
     */
    public function getActivityByColumn($item, $column): array
    {
        return $this->activityController->getByColumn($item, $column);
    }

}