<div>
    <form wire:submit.prevent="submitForm" method="post" class="mt-2">

        @error('formError')
            <span class="text-danger" role="alert">
                {{ $message }}
            </span>
        @enderror
        <div class="form-group">
            <small class="text-secondary ">LAST NAME <span class="text-danger">*</span></small>
            <input wire:model="last_name" type="text" class="form-control border border-info">
            @error('last_name')
                <small class="badge bg-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <small class="text-secondary ">FIRST NAME <span class="text-danger">*</span></small>
            <input wire:model="first_name" type="text" class="form-control border border-info">
            @error('first_name')
                <small class="badge bg-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <small class="text-secondary ">MIDDLE NAME</small>
            <input wire:model="middle_name" type="text" class="form-control border border-info">
            @error('middle_name')
                <small class="badge bg-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <small class="text-secondary ">EXTENSION NAME </small>
            <input wire:model="extension_name" type="text" class="form-control border border-info">
            @error('extension_name')
                <small class="badge bg-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <small class="text-secondary ">BIRTH DATE <span class="text-danger">*</span></small>
            <input wire:model="birth_date" type="date" class="form-control border border-info">
            @error('birth_date')
                <small class="badge bg-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <small class="text-secondary ">BIRTH PLACE <span class="text-danger">*</span></small>
            <input wire:model="birth_place" type="text" class="form-control border border-info">
            @error('birth_place')
                <small class="badge bg-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <small class="text-secondary ">SEX <span class="text-danger">*</span></small>
            <select wire:model="sex" class="form-select border border-info">
                <option selected>Select Sex</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            @error('sex')
                <small class="badge bg-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <small class="text-secondary ">CIVIL STATUS <span class="text-danger">*</span></small>
            <select wire:model="civil_status" class="form-select border border-info">
                <option selected>Select Civil Status</option>
                <option value="single">Single</option>
                <option value="Married">Married</option>
                <option value="Widowed">Widowed</option>
                <option value="Divorced">Divorced</option>
            </select>
            @error('civil_status')
                <small class="badge bg-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <small class="text-secondary ">CONTACT NUMBER</small>
            <input wire:model="contact_number" type="text" class="form-control border border-info">
            @error('contact_number')
                <small class="badge bg-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-info text-white w-100">SUBMIT</button>
    </form>
</div>
