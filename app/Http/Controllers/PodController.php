<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\Pod\Pod;
use App\Models\Pod\PodRank;
use App\Models\Pod\PodPost;

class PodController extends ApiController
{
    public function create() {
        $request = Validator::make(request()->all(), [
           'name' => 'required|max:32',
        ]);

        if ($request->fails()) {
            return $this->errorResponse($request->messages(), 422);
        }

        $pod = Pod::create([
            'name' => $request->get('name')
        ]);

        return $this->successResponse($pod, 'Pod created!', 201);
    }

    public function get(Pod $pod) {
        return $this->successResponse($pod);
    }

    public function update(Pod $pod) {
        $request = Validator::make(request()->all(), [
            'pod_id' => 'required|integer'
        ]);

        $fillables = $pod->getFillable();

        $updated = array();

        foreach ($fillables as $fillable) {
            if($request->has($fillable)) {
                $updated[$fillable] = $request->get($fillable);
            }
        }

        $pod->update($updated);

        return $this->successResponse($pod, 'Pod updated successfully!', 201);
    }

    public function delete(Pod $pod) {
        $pod->delete();
        return $this->successResponse(null, 'Pod Deleted');
    }

    public function validatePod() {
        return Validator::make(request()->all(), [
           'pod_id' => 'required|integer'
        ]);
    }

    public function createInvite() {

    }
}
