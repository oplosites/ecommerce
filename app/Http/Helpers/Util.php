<?php

namespace App\Http\Helpers;

use App\Models\DocTemplate;

class Util {

    /**
     * Get document template based on the given type
     */
    public static function getDocTemplate($string, $replacers = [])
    {

        // Get template by type
        $template = DocTemplate::all()
            ->where('type', $string)
            ->toArray();

        foreach ($template as $key => $value) {

            // Replace all brackets with replacers value
            foreach ($replacers as $k => $v) {

                $template[$key]["template"] = str_replace(
                    $k,
                    $v,
                    $template[$key]["template"]
                );

            }
        }

        // Return the template
        return $template;
    }

    /**
     * Convert list of array of object to template fields
     */
    public static function convertToTemplate($array)
    {

        // Initialize new template
        $template = [];

        // Build the template
        foreach ($array as $body) {

            if ($body->type != 'alf_obj_id' ||
                $body->type != 'number' ||
                $body->type != 'lastnum') {

                $template[] = [
                    'id' => $body->id,
                    'title' => $body->type,
                    'template' => $body->content,
                ];
            }
        }

        // Return the built template
        return $template;
    }

    /**
     * Building a templated json response from any given status, message and data
     */
     public static function buildResponse($status, $data, $message = 'OK')
     {
         if ($data == null) {
             $message = 'No data could be found';
         }
         // Default response template structure
         $responseTemplate = [
             'status'   => $status,
             'message'  => $message,
             'data'     => $data
         ];
         // Returning the json
         return json_encode($responseTemplate);
     }

     /**
      * Convert database structure to display structure of settings table
      */
     public static function convertSettingFields($settingsDb)
     {
         // Initialize empty converted fields
         $convertedFields = [];
         // Iterate each setting from database to converted fields
         foreach ($settingsDb as $setting) {
             $convertedFields[$setting->type] = $setting->value;
         }
         // Returning the result
         return $convertedFields;
     }

}
