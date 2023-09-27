<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Requests\AdminPanel\CreateSliderRequest;
use App\Http\Requests\AdminPanel\UpdateSliderRequest;
use App\Repositories\AdminPanel\SliderRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;


class sliderController extends AppBaseController
{
    /** @var  SliderRepository */
    private $SliderRepository;

    public function __construct(SliderRepository $sliderRepo)
    {
        $this->SliderRepository = $sliderRepo;
    }

    public function index(Request $request)
    {
        // return 'Done Arrive';

        $sliders = $this->SliderRepository->paginate(10);
        return view('adminPanel.sliders.index')
            ->with('sliders', $sliders );
            // return view( 'adminPanel.sliders.index' , get_defined_vars() );
    }


    public function create()
    {
        return view('adminPanel.sliders.create');
    }

    public function store(CreateSliderRequest $request)
    {
        $input = $request->all();

        $slider = $this->SliderRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/sliders.singular')]));

        return redirect(route('adminPanel.sliders.index'));
    }

    public function show($id)
    {
        $slider = $this->SliderRepository->find($id);

        if (empty($slider)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sliders.singular')]));

            return redirect(route('adminPanel.sliders.index'));
        }

        return view('adminPanel.sliders.show')->with('slider', $slider);
    }

    public function edit($id)
    {
        $slider = $this->SliderRepository->find($id);

        if (empty($slider)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sliders.singular')]));

            return redirect(route('adminPanel.sliders.index'));
        }

        return view('adminPanel.sliders.edit')->with('slider', $slider);
    }

    public function update($id, UpdateSliderRequest $request)
    {
        $slider = $this->SliderRepository->find($id);

        if (empty($slider)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sliders.singular')]));

            return redirect(route('adminPanel.sliders.index'));
        }

        $slider = $this->SliderRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/sliders.singular')]));

        return redirect(route('adminPanel.sliders.index'));
    }

    public function destroy($id)
    {
        $slider = $this->SliderRepository->find($id);

        if (empty($slider)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sliders.singular')]));

            return redirect(route('adminPanel.sliders.index'));
        }

        $this->SliderRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/sliders.singular')]));

        return redirect(route('adminPanel.sliders.index'));
    }

}
