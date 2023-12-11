<?php

namespace App\Controllers;

class Membership extends BaseController
{



    //admin
    public function showTransaction()
    {
        $transaction = $this->transaksiModel->allTransaction();
        $data = [
            'data' => $transaction,
            'tittle' => 'Transaksi User'

        ];

        return view('/admin/transaction', $data);
    }

    //user

    public function userTransaction()
    {
        $id_user = user_id();
        $datatrx = $this->transaksiModel->where('id_user', $id_user)->first();
        $data = [
            'transaksi' => $datatrx,
            'tittle' => 'Transaksi Anda'
        ];

        return view('/Transaction/orderlist', $data);
    }

    public function index(): string
    {

        return view('Transaction/membership');
    }


    public function beliMembership()
    {
        $id_user = user_id();
        $id_membership = $this->request->getVar('id_membership');

        // Check if the user has an existing transaction
        $existingTransaction = $this->transaksiModel->where('id_user', $id_user)->first();

        // If an existing transaction is found, prevent the new transaction
        if ($existingTransaction) {
            // You can handle this according to your application's requirements, e.g., show an error message.
            session()->setFlashdata('failed', true);
            return redirect()->to(base_url("/membership"));
        } else {



            // Define membership packages with corresponding durations and prices
            $membershipPackages = [
                1 => ["duration" => 1, "price" => 400000],
                2 => ["duration" => 2, "price" => 300000],
                3 => ["duration" => 3, "price" => 450000],
            ];

            // Check if the selected membership ID is valid
            if (array_key_exists($id_membership, $membershipPackages)) {
                // Get membership details
                $membership = $membershipPackages[$id_membership];


                // Prepare data to save to the database or perform other actions
                $data = [
                    'id_user' => $id_user,
                    'id_membership' => $id_membership,
                    'harga' => $membership['price'],
                ];

                // You can replace dd($data) with your database saving logic or other actions
                $this->transaksiModel->insert($data);

                session()->setFlashdata('success', true);
                return redirect()->to(base_url("/membership"));

            } else {
                // Handle invalid membership ID
                return 'Invalid membership ID';
            }
        }
    }

    public function manageTransaction()
    {
        $id_user = $this->request->getVar('id_user');
        $action = $this->request->getVar('action');

        if ($action == 'reject') {
            // Remove the user from the transaction
            $this->transaksiModel->where('id_user', $id_user)->delete();
        } else {
            $db = \Config\Database::connect();
            $builder = $db->table('auth_groups_users');


            // Role baru (group_id) yang akan diberikan
            $newGroupID = 3;

            // Menjalankan query UPDATE
            $builder->set('group_id', $newGroupID);
            $builder->where('user_id', $id_user);
            $builder->update();


            $this->transaksiModel->where('id_user', $id_user)->delete();


        }

        session()->setFlashdata('success', true);
        // Redirect or show a success message as needed
        return redirect()->to('/alltransaction');
    }






}