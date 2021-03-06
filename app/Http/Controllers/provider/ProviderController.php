<?php

namespace App\Http\Controllers\provider;

use App\Exports\InvoicesExport;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class ProviderController extends Controller
{


    //page all order
    public function index()
    {
        $active = 'order';
        $activeSub = 1;
        return view('provider_pages.index', compact('activeSub', 'active'));
    }
    public function accept($id = 0)
    {

        Order::where('id', $id)->update([

            'status' => '2'


        ]);
    }

    public function reject($id = 0)
    {

        Order::where('id', $id)->update([

            'status' => '3'


        ]);
    }
    protected function datatable()
    {
        $orders = Order::where('provider_id', auth()->user()->id)->where('status', '>', '0')->get();
        return DataTables::of($orders)->addColumn('status', function ($data) {
            if ($data->status == 'Waiting accept') {
                return " <button data-id= '" . $data->id . "' type='button' href='' class='icon-btn btn green accrr'  alt='send' title='Click to accept or reject' style='height:50px'><i class='fa fa-external-link'></i>     <div style='color:#fff'>    Accept  </div>   </button>";
            } else {

                return $data->status;
            }
        })->addColumn('details', function ($data) {
            return view('provider_pages.modals.modal', compact('data'));
        })->addColumn('files', function ($data) {
            $files = explode(',',$data->files);
            $output = '';
            foreach ($files as  $file) {
               $output .="<a target='_blank' href='".asset('files/'.$file)."'>$file</a><br>";
            }
            return $output;
        })->rawColumns(['status','files', 'details'])
            ->make(true);
    }



    //page send order

    public function page_send()
    {
        $activeSub=2;

        return view('provider_pages.order-send.index',compact('activeSub'));
    }



    protected function send_datatable()
    {

        $orders = Order::where('provider_id', auth()->user()->id)->where('status', '=', '1')->get();
        return DataTables::of($orders)->addColumn('status', function ($data) {
            if ($data->status == 'Waiting accept') {
                return " <button data-id= '" . $data->id . "' type='button' href='' class='icon-btn btn green accrr'  alt='send' title='Click to accept or reject' style='height:50px'><i class='fa fa-external-link'></i>     <div style='color:#fff'>    Accept  </div>   </button>";
            } else {

                return $data->status;
            }
        })->addColumn('details', function ($data) {
            return view('provider_pages.modals.modal', compact('data'));
        })->rawColumns(['status', 'details'])
            ->make(true);;
    }


    //page on progress



    public function page_onprogress()
    {
        $activeSub=3;
        return view('provider_pages.order-onprogress.index',compact('activeSub'));
    }


    protected function onprogress_datatable()
    {


        $orders = Order::where('provider_id', auth()->user()->id)->where('status', '=', '2')->get();
        return DataTables::of($orders)->addColumn('status', function ($data) {

            return  $data->status;
        })->addColumn('details', function ($data) {
            return view('provider_pages.modals.modal', compact('data'));;
        })->addColumn('Delivery', function ($data) {

            return view('provider_pages.modals.modalUpload', compact('data'));
        })->addColumn('files', function ($data) {
            $files = explode(',',$data->files);
            $output = '';
            foreach ($files as  $file) {
               $output .="<a target='_blank' href='".asset('files/'.$file)."'>$file</a><br>";
            }
            return $output;
        })->rawColumns(['status','files', 'details', 'Delivery'])->make(true);;
    }

    public function uploadFiles(Request $request, ImageService $imageService)
    {

        $validator = Validator::make($request->all(), [
            'order_id' => 'required|integer',
            'files' => 'array|max_uploaded_file_size:5000',
            'files.*' => 'required|file|mimes:jpeg,png,jpg,doc,docx,ppt,pps,pptx,xls,xlsx,pdf',
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            ), 400); // 400 being the HTTP code for an invalid request.
        }
        if ($request->hasfile('files')) {
            $pathfiles = '';
            foreach (request('files') as $value) {
                $pathfiles .= $imageService->upload($value, 'files') . ',';
            }
        }
        $pathfiles = substr($pathfiles, 0, -1);;

        Order::where(['id' => $request->order_id, 'provider_id' => auth()->user()->id])->update([
            'files_provider' => $pathfiles,
            'status' => 4,
            'delivery_date' => date('yy-m-d', time() + 86400 * 60),

        ]);
    }
    public function order_delivery(Request $request, ImageService $imageService)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|integer',
            'files' => 'array|max_uploaded_file_size:5000',
            'files.*' => 'required|file|mimes:jpeg,png,jpg,doc,docx,ppt,pps,pptx,xls,xlsx,pdf',
        ]);


        $input = $request->all();

        if ($request->hasfile('files')) {
            $pathfiles = '';
            foreach ($input['files'] as $value) {
                $pathfiles .= $imageService->upload($value, 'files') . ',';
            }
        }
        $input['files'] = substr($pathfiles, 0, -1);;

        Order::where(['id' => $request->order_id, 'provider_id' => auth()->user()->id])->update([
            'files_provider' => $input['files'],
            'status' => 4
        ]);
        return back()->with('success', 'The request has been delivered successfully');
    }

    //Completed requests page


    public function page_completed()
    {
        $activeSub=4;

        return view('provider_pages.order-completed.index',compact('activeSub'));
    }

    protected function completed_datatable()
    {


        $orders = Order::where('provider_id', auth()->user()->id)->where('status', '=', '4')->get();
        return DataTables::of($orders)->addColumn('status', function ($data) {

            return  $data->status;
        })->rawColumns(['status'])->make(true);;
    }


    //  page modification


    public function page_modification()
    {
        $activeSub=5;
        return view('provider_pages.order-modification.index',compact('activeSub'));
    }



    protected function modification_datatable()
    {

        $orders = Order::where('provider_id', auth()->user()->id)->where('status', '=', '5')->get();
        return DataTables::of($orders)->addColumn('status', function ($data) {
            return  $data->status;
        })->addColumn('details', function ($data) {
            return view('provider_pages.modals.modal', compact('data'));;
        })->addColumn('Delivery', function ($data) {
            return view('provider_pages.modals.modalUpload', compact('data'));;
        })->rawColumns(['status', 'details', 'Delivery'])->make(true);;
    }



    public function login()
    {


        User::create([

            'name' => 'admin',
            'role' => 'admin',
            'password' => Hash::make('123456789'),
            'email' => 'admin@admin.com'
        ]);
    }
    ///page invoices

    public function invoice_page()
    {
        $activeSub=6;

        return view('provider_pages.Invoices_provider.index',compact('activeSub'));
    }
    protected function invoice_datatable()
    {


        $invoices = Invoice::where('provider_id', auth()->user()->id)->get();
        return DataTables::of($invoices)->addColumn('details', function ($data) {
            return
                " <a class='icon-btn btn blue' href='" . route('detials.provider.invoice', ['id' => $data->id]) . "' style=' color:#fff ; height:50px'>
                    <i class='fa fa-file-o'></i>

                    <div style='color:#fff'>
                   Details
                   </div></a>";
        })->rawColumns(['details'])->make(true);;
    }


    public function invoice_details($id){


        $invoice = Invoice::findOrFail($id);
        return view('provider_pages.Invoices_provider.details',compact('invoice'));

    }

    public function exportExcel()
    {
            $invoices  = Invoice::where('provider_id',auth()->user()->id)->get();
            if($invoices){
                return  Excel::download(new InvoicesExport($invoices), time() . '_Invoice.xlsx');
            }
        return null;
    }
}
