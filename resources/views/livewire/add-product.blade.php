<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

        <form wire:submit.prevent="create" class="row">
            <div class="control-group col-md-2">

                <input wire:model.defer="name" class="form-control @error('name') is-invalid @enderror"
                       type="text" aria-describedby="validation-name-feedback" placeholder="Product Name">
                @error('name')

                <div id="validation-name-feedback" class="invalid-feedback">
                    {{ $message }}
                </div>

                @enderror
            </div>

            <div class="control-group col-md-2">

                <input wire:model.defer="price" placeholder="Price"
                       class="form-control @error('price') is-invalid @enderror" type="text"
                       aria-describedby="validation-price-feedback">
                @error('price')
                <div id="validation-price-feedback" class="invalid-feedback">
                    {{ $message }}
                </div>

                @enderror
            </div>

            <div class="control-group col-md-2">

                <textarea wire:model.defer="description" placeholder="Description"
                       class="form-control @error('description') is-invalid @enderror" type="text"
                       aria-describedby="validation-discount-feedback">
                </textarea>
                @error('description')

                <div id="validation-discount-feedback" class="invalid-feedback">
                    {{ $message }}
                </div>

                @enderror
            </div>

{{--            <div class="control-group col-md-2">--}}

{{--                <select wire:model="category_id" id="category_id" class="form-control" aria-label="Default select example">--}}
{{--                    @foreach($categories as $category)--}}
{{--                        <option value="{{ $category->id }}" >{{ $category->name }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            <div class="control-group col-md-2">--}}

{{--                <input wire:model.defer="quantity" placeholder="Quantity"--}}
{{--                       class="form-control @error('quantity') is-invalid @enderror" type="text"--}}
{{--                       aria-describedby="validation-quantity-feedback">--}}
{{--                @error('quantity')--}}
{{--                <div id="validation-quantity-feedback" class="invalid-feedback">--}}
{{--                    {{ $message }}--}}
{{--                </div>--}}

{{--                @enderror--}}
{{--            </div>--}}

            <div class="form-control-md col-md-2">

                <button type="submit" class="btn btn-primary"> {{ __('Save') }} </button>
            </div>

        </form>
        <div wire:loading>
            Chargement ...
        </div>
</div>
