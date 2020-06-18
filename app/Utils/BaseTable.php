<?php
/**
 * Created by  Joel Valdivia
 * Date: 16 Jun 2020
 */

namespace App\Utils;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class BaseTable
 * @package App\Utils
 *
 * Clase para obtener el nombre de columnas de una tabla o vista
 *
 * created René Ríos Rodríguez
 * date 03 dic 2019
 */

class BaseTable extends Model
{

    public static function getTableColumns($table)
    {
       return DB::getSchemaBuilder()->getColumnListing($table);
    }

    public static function getColumns($tableColumns, $table) {
        
        $withoutColumns = $table->tables_columns->where('visible', false)->pluck('column');
        $columnActions = $table->tables_columns->where('visible', true)->where('column', 'Acciones')->first();

        if($columnActions)
            array_push($tableColumns, $columnActions->column);

        /**
         * obtener solo los valores de las columnas
         */
        return self::cleanColumns($tableColumns, $withoutColumns);

    }

    public static function cleanColumns($columns, $otherColumns = []) {
    
        $columnsDefault = collect(['created_at', 'updated_at', 'deleted_at']);
        
        foreach($otherColumns as $column) {
            $columnsDefault->push($column);
        }
        $columnas = array_diff($columns, $columnsDefault->toArray());
        /**
         * obtener solo los valores de las columnas
         */
        return array_values($columnas);

    }

}