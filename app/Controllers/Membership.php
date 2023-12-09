<?php

namespace App\Controllers;

class Membership extends BaseController
{
    public function index(): string
    {

        return view('Transaction/membership');
    }

    public function showTransaction(){
        $transaction = $this->transaksiModel->allTransaction();
        $data = [
            'data' => $transaction,
            'tittle' => 'Transaksi User'

        ];

        return view('/admin/transaction', $data);
    }


    public function beliMembership()
    {
        $id_user = $this->request->getVar('id_user');
        $id_membership = $this->request->getVar('id_membership');
    
        // Define membership packages with corresponding durations and prices
        $membershipPackages = [
            1 => ["duration" => 1, "price" => 170000],
            2 => ["duration" => 2, "price" => 300000],
            3 => ["duration" => 3, "price" => 450000],
        ];
    
        // Check if the selected membership ID is valid
        if (array_key_exists($id_membership, $membershipPackages)) {
            // Get membership details
            $membership = $membershipPackages[$id_membership];
    
            // Calculate end time based on current date and membership duration
            // $start_time = date('Y-m-d H:i:s');
            // $end_time = date('Y-m-d H:i:s', strtotime("+$membership[duration] months"));
    
            // Prepare data to save to the database or perform other actions
            $data = [
                'id_user' => $id_user,
                'id_membership' => $id_membership,
                'harga' => $membership['price'],
            ];

    
            // You can replace dd($data) with your database saving logic or other actions
            $this->transaksiModel->insert($data);

        } else {
            // Handle invalid membership ID
            dd('Invalid membership ID');
        }
    }
    


}