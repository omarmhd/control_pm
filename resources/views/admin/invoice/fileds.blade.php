<form action="{{ $action }}"  method="post" enctype="multipart/form-data">
    @csrf
    @isset($updateForm)
         @method('put')
    @endisset
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <label for="down_payment" class="col-form-label">Down payment:</label>
            <input type="number" class="form-control" name="down_payment" id="down_payment" @isset($invoice) value="{{$invoice->down_payment }}" @endisset  value="{{ old('down_payment') }}">
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
          <label for="payment_method" class="col-form-label">Payment method:</label>
          <input type="text" class="form-control" name="payment_method" id="payment_method" @isset($invoice) value="{{$invoice->payment_method }}" @endisset value="{{ old('payment_method') }}">
          </div>
      </div>

		<div class="col-md-6">
      <div class="form-group">
        <label class="control-label">Providers :</label>
        <select class="select2_category form-control" data-placeholder="Choose a Provider" name="provider_id" tabindex="1" value="{{ old('provider_id') }}">
          @foreach ($providers as $provider)
            <option value="{{ $provider->id }}" @isset($invoice) {{ $invoice->provider_id == $provider->id ? "selected" : "" }} @endisset>{{ $provider->name }}</option>
          @endforeach
        </select>
       <small><a href="{{ route('admin.provider.create') }}">Add New Provider</a></small>
      </div>
    </div>
		
    <div class="col-md-6">
      <div class="form-group">
        <label for="file" class="control-label">Receipt :</label>
          <input type="file" id="file" name="file">
      </div>
    </div>
    @isset($invoice)
    <div class="col-md-6">
      <div class="form-group">
        <label for="files" class="control-label">File Download</label>
        <p><a target="_blank" href="{{ asset('files/'.$invoice->file) }}">{{ $invoice->file }}</a></p>   
      </div>
    </div>
    @endisset
  

    </div>
 
    <div class="form-actions right">
      <button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
    </div>
  </form>