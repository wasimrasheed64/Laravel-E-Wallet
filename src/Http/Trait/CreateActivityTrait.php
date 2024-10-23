<?php

namespace Wasimrasheed\EWallet\Http\Trait;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Wasimrasheed\EWallet\Http\Controllers\ActivityController;
use Wasimrasheed\EWallet\Validations\ActivityValidations;

/**
 *
 */
trait CreateActivityTrait
{
    /**
     * @var ActivityController
     */
    protected ActivityController $activityController;
    protected ActivityValidations $activityValidations;

    /**
     * Constructor to inject the ActivityController.
     */
    public function initCreateActivityTrait(ActivityController $activityController, ActivityValidations $activityValidations): void
    {
        $this->activityController = $activityController;
        $this->activityValidations = $activityValidations;
    }
    public function createActivity(array $data)
    {
        try{
            $validatedData = $this->activityValidations->createActivityValidation($data);
            return $this->activityController->store($validatedData);
        }catch(Exception $e){
            throw new Exception($e);
        }
    }


    /**
     * @param int $id
     * @return array
     * @throws \Exception
     */
    public function getActivity(int $id): array
    {
        try {
            return $this->activityController->getById($id);
        }catch (Exception $e){
            throw new Exception($e);
        }
    }


    /**
     * @return Collection
     * @throws Exception
     */
    public function getActivities(): Collection
    {
        try {
            return $this->activityController->getAll();
        }catch (Exception $e){
            throw new Exception($e);
        }
    }

    /**
     * @param int $id
     * @param array $data
     * @return string
     * @throws \Exception
     */
    public function updateActivity(int $id, array $data): string
    {
        try{
            $validatedData = $this->activityValidations->updateActivityValidation($data);
            $this->activityController->update($id, $validatedData);
            return 'Activity updated successfully';
        }catch(Exception $e){
            throw new Exception($e);
        }
    }


    /**
     * @param int $id
     * @return string
     * @throws Exception
     */
    public function deleteActivity(int $id): string
    {
        try {
            $this->activityController->delete($id);
            return 'Activity deleted successfully';
        }catch (Exception $e){
            throw new Exception($e);
        }
    }

    /**
     * @param $item
     * @param $column
     * @return array
     * @throws Exception
     */
    public function getActivityByColumn($item, $column): array
    {
        try {
            return $this->activityController->getByColumn($item, $column);
        }catch (Exception $e){
            throw new Exception($e);
        }
    }

}