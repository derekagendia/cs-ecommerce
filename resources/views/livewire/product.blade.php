<div>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('message') }}.
                    </div>
                @endif
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">List of Product</h4>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add
                        Product
                    </button>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a href="#">Table</a></li>
                        <li class="active">List of product</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /row -->
            <div x-data="{ editable: false }" class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Product Export</h3>
                        <p class="text-muted m-b-30">Export product to Copy, CSV, Excel, PDF & Print</p>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Negociable Price</th>
                                    <th>Is Negociable</th>
                                    <th>Description</th>
                                    <th>Cover image</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ number_format($product->price) }} FCFA</td>
                                        <td>{{ $product->is_negociable ? number_format($product->price_negociable). ' FCFA' : 'NOT NEGOCIABLE' }}</td>
                                        <td class="badge rounded-pill {{ $product->is_negociable ? 'bg-success' : 'bg-danger' }}">{{ $product->is_negociable ? 'yes' : 'no' }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td><img src="{{ asset(Voyager::image($product->cover_img)) }}"
                                                 class="img img-circle" alt="img"
                                                 style="height: 50px;"/></td>
                                        <td class="text-nowrap">
                                            <button wire:click="productEdit({{$product->id}})"
                                                    class="fcbtn btn btn-success btn-outline btn-1d" data-toggle="modal"
                                                    data-target="#updateproduct">Edit
                                            </button>
                                            <button wire:click="deleteProduct({{$product->id}})"
                                                    class="fcbtn btn btn-danger btn-outline btn-1d">Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel1"
                     style="display: none;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                                <h4 class="modal-title" id="exampleModalLabel1">Add new product </h4>
                            </div>
                            <div class="modal-body">
                                <form x-data="{ open: true }" wire:submit.prevent="saveProduct">
                                    <div class="form-group @error('name') has-error @enderror">
                                        <label for="recipient-name" class="control-label">Product Name:</label>
                                        <input wire:model.defer="name" type="text"
                                               class="form-control" id="recipient-name1">
                                    </div>

                                    <div class="form-group @error('brand') has-error @enderror">
                                        <label for="recipient-name" class="control-label">Product brand:</label>
                                        <input wire:model.defer="brand" type="text"
                                               class="form-control" id="recipient-name1">
                                    </div>

                                    <div class="form-group @error('state') has-error @enderror">
                                        <label for="recipient-name" class="control-label">Product State:</label>
                                        <input wire:model.defer="state" type="text"
                                               class="form-control" id="recipient-name1">
                                    </div>

                                    <div class="form-group @error('description') has-error @enderror">
                                        <label for="message-text" class="control-label">Description:</label>
                                        <textarea wire:model.defer="description" class="form-control"
                                                  id="message-text1"></textarea>
                                    </div>

                                    <div class="form-group @error('info') has-error @enderror">
                                        <label for="message-text" class="control-label">Detailed Info:</label>
                                        <textarea wire:model.defer="info" class="form-control"
                                                  id="message-text1"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Category</label>
                                        <select wire:model.defer="categories_id" class="form-control"
                                                data-placeholder="Choose a Category" tabindex="1">
                                            <option value="null">--Select your Category--</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group @error('price') has-error @enderror">
                                        <label for="recipient-name" class="control-label">Price</label>
                                        <input wire:model.defer="price" type="text" class="form-control"
                                               id="recipient-name1">
                                    </div>
                                    <div class="form-group @error('is_negociable') has-error @enderror">
                                        <div class="checkbox checkbox-danger">
                                            <input x-on:click="open = !open" wire:model.defer="is_negociable"
                                                   id="checkbox0" type="checkbox">
                                            <label for="checkbox0"> Is Negociable ? </label>
                                        </div>
                                    </div>
                                    <div x-show="open"
                                         class="form-group @error('price_negociable') has-error @enderror">
                                        <label for="recipient-name" class="control-label">Price Negociable</label>
                                        <input wire:model.defer="price_negociable" type="text" class="form-control"
                                               id="recipient-name1">
                                    </div>
                                    <div class="form-group">
                                        <div class="white-box @error('cover_img') has-error @enderror">
                                            <h3 class="box-title">Image Cover</h3>
                                            <input wire:model.defer="cover_img" type="file" required/>
                                        </div>

                                        <div class="white-box @error('image_2') has-error @enderror">
                                            <h3 class="box-title">Image Cover</h3>
                                            <input wire:model.defer="image_2" type="file" required/>
                                        </div>

                                        <div class="white-box @error('image_3') has-error @enderror">
                                            <h3 class="box-title">Image Cover</h3>
                                            <input wire:model.defer="image_3" type="file" required/>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add product</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div wire:ignore.self class="modal fade" id="updateproduct" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel1"
                     style="display: none;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                                <h4 class="modal-title" id="exampleModalLabel1">Update product </h4>
                            </div>
                            <div class="modal-body">
                                <form x-data="{ open: true }" wire:submit.prevent="updateProduct">
                                    <div class="form-group @error('name') has-error @enderror">
                                        <label for="recipient-name" class="control-label">Product Name:</label>
                                        <input wire:model.defer="name" type="text"
                                               class="form-control" id="recipient-name1">
                                    </div>
                                    <div class="form-group @error('brand') has-error @enderror">
                                        <label for="recipient-name" class="control-label">Product brand:</label>
                                        <input wire:model.defer="brand" type="text"
                                               class="form-control" id="recipient-name1">
                                    </div>

                                    <div class="form-group @error('state') has-error @enderror">
                                        <label for="recipient-name" class="control-label">Product State:</label>
                                        <input wire:model.defer="state" type="text"
                                               class="form-control" id="recipient-name1">
                                    </div>

                                    <div class="form-group @error('description') has-error @enderror">
                                        <label for="message-text" class="control-label">Description:</label>
                                        <textarea wire:model.defer="description" class="form-control"
                                                  id="message-text1"></textarea>
                                    </div>

                                    <div class="form-group @error('info') has-error @enderror">
                                        <label for="message-text" class="control-label">Detailed Info:</label>
                                        <textarea wire:model.defer="info" class="form-control"
                                                  id="message-text1"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Category</label>
                                        <select wire:model.defer="categories_id" class="form-control"
                                                data-placeholder="Choose a Category" tabindex="1">
                                            <option value="null">--Select your Category--</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group @error('price') has-error @enderror">
                                        <label for="recipient-name" class="control-label">Price</label>
                                        <input data-mask="XAF 000-000" wire:model.defer="price" type="text"
                                               class="form-control"
                                               id="recipient-name1">
                                    </div>
                                    <div class="form-group @error('is_negociable') has-error @enderror">
                                        <div class="checkbox checkbox-danger">
                                            <input x-on:click="open = !open" wire:model.defer="is_negociable"
                                                   id="checkbox0" type="checkbox">
                                            <label for="checkbox0"> Is Negociable ? </label>
                                        </div>
                                    </div>
                                    <div x-show="open"
                                         class="form-group @error('price_negociable') has-error @enderror">
                                        <label for="recipient-name" class="control-label">Price Negociable</label>
                                        <input wire:model.defer="price_negociable" type="text" class="form-control"
                                               id="recipient-name1">
                                    </div>
                                    <div class="form-group @error('cover_img') has-error @enderror">
                                        <div class="white-box">
                                            <h3 class="box-title">Image Cover</h3>
                                            <input wire:model.defer="cover_img" type="file" required/>
                                        </div>

                                        <div class="white-box">
                                            <h3 class="box-title">Image Cover 2</h3>
                                            <input wire:model.defer="image_2" type="file" required/>
                                        </div>

                                        <div class="white-box">
                                            <h3 class="box-title">Image Cover 3</h3>
                                            <input wire:model.defer="image_3" type="file" required/>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Update Product</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
