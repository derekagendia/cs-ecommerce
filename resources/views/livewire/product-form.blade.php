<td colspan="6">
    <form wire:submit.prevent="update" class="row">
        <div class="control-group col-md-2">

            <input wire:model.defer="product.name" class="form-control @error('product.name') is-invalid @enderror"
                   type="text" aria-describedby="validation-name-feedback" placeholder="Name">
            @error('product.name')

            <div id="validation-name-feedback" class="invalid-feedback">
                {{ $message }}
            </div>

            @enderror
        </div>

        <div class="control-group col-md-2">

            <input wire:model.defer="product.price" placeholder="Price"
                   class="form-control @error('product.price') is-invalid @enderror" type="text"
                   aria-describedby="validation-price-feedback">
            @error('product.price')
            <div id="validation-price-feedback" class="invalid-feedback">
                {{ $message }}
            </div>

            @enderror
        </div>

        <div class="control-group col-md-2">

            <textarea wire:model.defer="product.description" placeholder="Discount" rows="4" cols="50"
                   class="form-control @error('product.description') is-invalid @enderror"
                   aria-describedby="validation-discount-feedback">
            </textarea>
            @error('product.discount')

            <div id="validation-discount-feedback" class="invalid-feedback">
                {{ $message }}
            </div>

            @enderror
        </div>
{{-- Product category --}}
{{--        <div class="control-group col-md-2">--}}

{{--            <select wire:model="idProduct" class="form-control" aria-label="Default select example">--}}
{{--                @foreach($category as $categories)--}}
{{--                    <option value="{{ $categories->id }}" >{{ $categories->name }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--            @error('product.category.name')--}}
{{--            <div id="validation-category-feedback" class="invalid-feedback">--}}
{{--                {{ $message }}--}}
{{--            </div>--}}

{{--            @enderror--}}
{{--        </div>--}}

{{--        <div class="control-group col-md-2">--}}

{{--            <input wire:model.defer="product.quantity" placeholder="Quantity"--}}
{{--                   class="form-control @error('product.quantity') is-invalid @enderror" type="text"--}}
{{--                   aria-describedby="validation-quantity-feedback">--}}
{{--            @error('product.quantity')--}}
{{--            <div id="validation-quantity-feedback" class="invalid-feedback">--}}
{{--                {{ $message }}--}}
{{--            </div>--}}

{{--            @enderror--}}
{{--        </div>--}}

        <div class="form-control-md col-md-2">

            <button type="submit" class="btn btn-primary"> {{ __('Save') }} </button>
        </div>

    </form>
    <div wire:loading>
        Chargement ...
    </div>
</td>
