<?php

namespace App\Http\Controllers;

use OpenSpout\Reader\XLSX\Reader;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function MakeVisited(Customer $customer)
    {
        $customer->update(["visited" => 1, "visited_at" => now()]);
        $customer->salesman->update(['availability' => true]);
        return redirect()->back();
    }
    public function addNewCustomer(Request $request)
    {
        Customer::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            // 'phone_number' => $request->input('phone_number'),
            'visited' => false,
            'visiting_salesman' => null
        ]);
    }
    public function importExcelToCustomerController(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx|max:20480',
        ]);

        $reader = new Reader();
        $reader->open($request->file('excel_file')->getRealPath());

        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $index => $row) {
                if ($index === 1)
                    continue;

                $cells = $row->toArray();

                if (empty($cells)) {
                    continue;
                }
                $name = isset($cells[0]) ? trim($cells[0]) : null;
                $address = isset($cells[1]) ? trim($cells[1]) : null;

                if (empty($name) && empty($address)) {
                    continue;
                }

                $mappedData = [
                    'name' => $name,
                    'address' => $address,
                ];
                $customerRequest = new Request($mappedData);
                $this->addNewCustomer($customerRequest);
            }
        }

        $reader->close();

        return redirect('/');
    }
    public function DropCustomer(Customer $customer)
    {
        $customer->update(['visiting_salesman' => null]);
        return redirect()->back();
    }
    public function DelCustomer(Customer $customer)
    {
        $customer->delete();
        return redirect()->back();
    }
}