<div class="row list_number{{$addcount}}">
<div class="col-md-3 " style="position: relative;">
    <small>From</small>

        <div class="airport-name ">
        
            <select class="form-control js-example-basic-single" name="fromPlace" id="multi_fromPlace">
                {{-- <option value="">Select From</option> --}}
                @foreach (DB::table('airport_details')->get() as $airport)
                    <option value="{{ $airport->code }}">{{ $airport->name . ', ' . $airport->country }}
                    </option>
                @endforeach
            </select>
        </div>
       
</div>

<div class="col-md-3">

    <small>To</small>
    <div class="airport-name">
      <select class="form-control js-example-basic-single" name="toPlace" id="multi_toPlace">
            {{-- <option value="">Select To</option> --}}
            @foreach (DB::table('airport_details')->get() as $airport)
                <option value="{{ $airport->code }}">{{ $airport->name . ', ' . $airport->country }}
                </option>
            @endforeach
        </select>
    </div>
    <span id="sameFromTo"  class="validation-error">From & To airports cannot be the same</span>

</div>
<div class="col-md-4">
    <div class="row">
        <div class="col-md-6">
            <small>Departure</small>
            <div class="airport-name" id="travelInfo">
                <label>
                    Departure
                    <input id="flightBookingDepartMulti" mbsc-input data-input-style="outline"
                        data-label-style="stacked" class="flightBookingDepartMulti" placeholder="Please select..." />
                </label>

            </div>


        </div>
      
        <div class="col-md-6 hideaddbtn{{$addcount}}"  >
            <small></small>
            <div class="airport-name" id="travelInfo">
                <a id="" type="" class="btn btn-search-flights" onclick="addMulticityRow()" >Add</a>
            </div>
        </div>
       

    </div>
</div>
<div class="col-md-2 hideclsbtn{{$addcount}}"  >
    <small></small>

    <div class="airport-name" id="travelInfo">
        <a id="" type="" class="btn btn-danger" onclick="closeMulticityRow({{$addcount}})" >Close</a>
    </div>
</div>
</div>