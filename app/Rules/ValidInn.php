<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidInn implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
      if(!preg_match('/^[0-9]{12}$/', $value)){
        return false;
      }
      
      $checksum_1 = $this->get_checksum_1($value);
      $checksum_2 = $this->get_checksum_2($value);

      return $checksum_1 == $value[10] && $checksum_2 == $value[11];
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Введенные данные не являются валидным ИНН';
    }

    public function get_checksum_1($string)
    {
      $checksum_weights = array(7,2,4,10,3,5,9,4,6,8,0);
      $checksum = 0;
      foreach($checksum_weights as $key => $coefficient){
        $checksum += $coefficient * $string[$key];
      }
      $checksum = $checksum % 11;
      if($checksum > 9){
        $checksum = $checksum % 10;
      }
      return $checksum;
    }

    public function get_checksum_2($string)
    {
      $checksum_weights = array(3,7,2,4,10,3,5,9,4,6,8,0);
      $checksum = 0;
      foreach($checksum_weights as $key => $coefficient){
        $checksum += $coefficient * $string[$key];
      }
      $checksum = $checksum % 11;
      if($checksum > 9){
        $checksum = $checksum % 10;
      }
      return $checksum;
    }
}
