@extends ('layouts.app')
@section('content')
 

    <h1 class="mb-8 font-bold text-3xl text-teal-400 font-medium">{{ $account->name }}</h1>

    <div class="bg-white ml-3 rounded max-w-3xl">

        <p class="font-bold text-lg text-grey-darkest">Email:
            <span class="font-normal py-2 px-3 text-grey-800 w-full">{{ $account->email}}</span>
        </p>

        <p class=" font-bold text-lg text-grey-darkest">Phone:
            <span class="font-normal py-2 px-3 text-grey-800 w-full" >{{ $account->phone}}</span>
        </p>
        <p class=" font-bold text-lg text-grey-darkest">Address:
            <span class="font-normal py-2 px-3 text-grey-800 w-full">{{ $account->address}}</span>
        </p>
        <p class=" font-bold text-lg text-grey-darkest">Account Owner:
            <span class="font-normal py-2 px-3 text-grey-800 w-full">{{ $account->owner->name}}</span>
        </p>
        <h4 class="mt-4 mb2 font-bold text-xl text-teal-400 font-medium">
            Contacts ({{$account->contacts->count()}})
        </h4>

        <p><a href="{{route('contact.create')}}"><i class="text-teal-400  fas fa-plus-circle"></i> Add Contact</a></p>
        <table class="table-auto">
            <thead>
                <th>Name</th>
                <th>Title</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Last Activity</th>
            </thead>
            <tbody>
                @foreach ($account->contacts as $contact)
                
                <tr>
                    <td class="border font-bold"><a href="{{route('contact.show', $contact->id)}}">{{$contact->fullName()}}</a></td>
                    <td class="border">{{$contact->title}}</td>
                    <td class="border">{{$contact->phone}}</td>
                    <td class="border">{{$contact->email}}</td>
                    <td class="border">{{$contact->recentActivities->max('activity_date')}}</td>

                </tr>
                @endforeach
            </tbody>

        </table>
        <h4 class="mt-4 mb-2 font-bold text-xl text-teal-400 font-medium">
            Open Opportunities ({{$account->openOpportunities->count()}})
        </h4>
        <p><a href="{{route('opportunity.create')}}"><i class="text-teal-400  fas fa-plus-circle"></i> Add Opportunity</a></p>
        <table class="table-auto">
            <thead>
                <th>Opportunity</th>
                <th>Owner</th>
                <th>Value</th>
                <th>Stage</th>
                <th>Expected Close</th>
            </thead>
            <tbody>
                @foreach ($account->openOpportunities as $opportunity)
                <tr>
                    <td class="border">{{$opportunity->title}}</td>
                    <td class="border">{{$opportunity->owner->name}}</td>
                    <td class="border">{{$opportunity->value}}</td>
                    <td class="border">{{$opportunity->stage->stage}}</td>
                    <td class="border">{{$opportunity->close_date}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>

    <h4 class="mt-4 mb-2 font-bold text-xl text-teal-400 font-medium">
            Recent Activities ({{$recentActivities->count()}})
        </h4>
    <p><a href="{{route('activity.create', $account->id)}}"><i class="text-teal-400  fas fa-plus-circle"></i> Add Activity</a></p>

        <table class="table-auto">
            <thead>
                <th>Activity</th>
                
                <th>Contact</th>
                <th>Activity Date</th>
                
            </thead>

            <tbody>
                @foreach ($recentActivities as $activity)
            
                <tr>
                    <td class="border">{{$activity->activity_type_id}}</td>
                    <td class="border">{{$activity->contact_id}}</td>
                    <td class="border">{{$activity->activity_date}}</td>
                    

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


