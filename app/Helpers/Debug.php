<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Debug
{

    /**
     * Executes the given callback while listening to and printing all SQL queries executed.
     * 
     * @param callable $callback The callback containing the code block to monitor.
     * 
     * @return never
     */
    public static function listenAndPrintSql(callable $callback): never
    {
        self::startListenSql();

        $callback();

        self::stopListenAndPrintSql();
    }

    /**
     * Starts SQL query logging by flushing and enabling the query log.
     *
     * @return void
     */
    public static function startListenSql(): void
    {
        DB::flushQueryLog();
        DB::enableQueryLog();
    }

    /**
     * Stops SQL query logging and dumps the logged queries.
     *
     * This method disables the query log and immediately dumps all recorded queries.
     * 
     * @return never
     */
    public static function stopListenAndPrintSql(): never
    {
        DB::disableQueryLog();
        dd(DB::getQueryLog());
    }
}
