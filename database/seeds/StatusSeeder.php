<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d");

        /**
         * Transaction Statuses
         */
        $txStatuses = [
            "initiated",
            "return",
            "canceled",
            "finished",
        ];

        $txs = [];

        foreach ($txStatuses as $key => $value) {
            $txs[] = [
                "title" => $value,
                "description" => $value,
                "created_by" => "SYSTEM",
                "created_at" => $now,
            ];
        }

        DB::table('tx_statuses')->insert($txs);

        /**
         * Invoice Statuses
         */
        $invStatuses = [
            "initiated",
            "canceled",
            "paid",
        ];

        $invs = [];

        foreach ($invStatuses as $key => $value) {
            $invs[] = [
                "title" => $value,
                "description" => $value,
                "created_by" => "SYSTEM",
                "created_at" => $now,
            ];
        }

        DB::table('invoice_statuses')->insert($invs);

        /**
         * Cart Statuses
         */
        $cartStatuses = [
            "initiated",
            "canceled",
            "finished",
        ];

        $carts = [];

        foreach ($cartStatuses as $key => $value) {
            $carts[] = [
                "title" => $value,
                "description" => $value,
                "created_by" => "SYSTEM",
                "created_at" => $now,
            ];
        }

        DB::table('cart_statuses')->insert($carts);
    }
}
