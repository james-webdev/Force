
      <div class="flex flex-col mb-4 md:w-1/2">
        <label class="mb-2 uppercase tracking-wide font-bold text-lg text-grey-darkest" for="title">Title</label>
        <input required class="border py-2 px-3 text-grey-darkest md:mr-2" 
        type="text" 
        name="title" 
        id="title">
      </div>
      <div class="flex flex-col mb-4 md:w-1/2">
        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest md:ml-2" for="clsoe_date">Expected / Actual Close</label>
        <input required class="border py-2 px-3 text-grey-darkest md:ml-2" 
        type="date" 
        name="close_date" id="close_date">
      </div>
      <div class="flex flex-col mb-4 md:w-full">
        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="status">Status</label>
        <select required class="border py-2 px-3 text-grey-darkest" name="status" id="status">
          <option value='0' selected >Open</option>
          <option value='1'>Closed Won</option>
          <option value='2'>Closed Lost</option>
        </select>
      </div>
      <div class="flex flex-col mb-4 md:w-full">
        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="stage_id">Stage</label>
        <select required class="border py-2 px-3 text-grey-darkest" name="stage_id" id="stage_id">
          @foreach ($stages as $id=>$stage)
            <option value="{{$id}}">{{$stage}}</option>
          @endforeach
        </select>
      </div>
      <div class="flex flex-col mb-4 md:w-full">
        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="description">Description</label>
        <textarea required class="border py-2 px-3 text-grey-darkest" type="text" name="description" id="descripiton"></textarea>
      </div>
      <div class="flex flex-col mb-6 md:w-full">
        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="password">Value</label>
        <input required class="border py-2 px-3 text-grey-darkest" type="text"  pattern = "\d+" name="value" id="value">
      </div>
      