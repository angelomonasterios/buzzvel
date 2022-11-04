<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Qr as QrModel;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class Qr extends Controller
{
    use ApiResponser;

    /**
     * this funtion save qr code generated to show before to user
     * @param Request $request
     * @return JsonResponse
     */
    public function save(Request $request)
    {
        $allRequest = $request->all();
        try {
            $validate = validator::make($allRequest, [
                'name' => 'required|string',
                'gitHub' => 'required|url',
                'linkedin' => 'required|url'
            ]);

            if($validate->fails()){
                return $this->success(['error' => $validate->messages()]);;
            }

            if(QrModel::query()->where('name', '=', $allRequest['name'])->count() > 0){
               return $this->success(['error' => ['name' => $allRequest['name'] . ' is already in exists']]);
            }

            $qr = new QrModel();
            $qr->setAttribute('name', $allRequest['name']);
            $qr->setAttribute('gitHub', $allRequest['gitHub']);
            $qr->setAttribute('linkedin', $allRequest['linkedin']);
            $qr->save();

            return $this->success(['error' => null]);
        } catch (\Exception|\Throwable $e) {
            Log::Error($e->getMessage());
            return $this->error($e->getMessage(), 500);
        }

    }

    public function get(Request $request, $id) {
        $data = QrModel::query()->where('name','=', $id)->first();
        return $this->success($data);
    }
}
