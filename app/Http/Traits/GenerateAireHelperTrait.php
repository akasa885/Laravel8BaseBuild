<?php
namespace App\Http\Traits;

trait GenerateAireHelperTrait {
    
    public function createSelect($select, $select_name , $label_none = '-- Pilih --', $option_none = true)
    {
        $select_options = [];
        
        if ($option_none) {
            $select_options = ['none' => $label_none];
        }

        foreach ($select as $key => $value) {
            $select_options[$value->id] = $value->$select_name;
        }
        
        return $select_options;
    }

    public function createSelectArrayCollection($select, $select_name , $label_none = '-- Pilih --', $option_none = true)
    {
        $select_options = [];
        
        if ($option_none) {
            $select_options = ['none' => $label_none];
        }

        foreach ($select as $key => $value) {
            $select_options[$value['id']] = $value[$select_name];
        }
        
        return $select_options;
    }

    public function createArrayYearFromDateTime($model, string $field = 'created_at', $key = null)
    {
        
        $model_year = $model->pluck($field)->map(function ($item, $key) {
            return $item->format('Y');
        })->unique()->toArray();

        // if array empty, add current year
        if (empty($model_year)) {
            $model_year[] = date('Y');
            $year = [];

            if($key != null && $key == $field)
            {
                foreach ($model_year as $key => $value) {
                    $year[$value] = $value;
                }
            } else {
                foreach ($model_year as $key => $value) {
                    $year[$key] = $value;
                }
            }
    
            return $year;
        }
        
        // check if key is not null and field is same as key, if not return array
        if ($key != null && $key == $field) {
            $model_year = array_combine($model_year, $model_year);
        }

        return $model_year;
    }
    
}