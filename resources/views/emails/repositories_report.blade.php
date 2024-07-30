@component('mail::message')
# Popular GitHub Repositories Report

Here are the details of the popular GitHub repositories:

@component('mail::table')
| Name       | Stars      | URL         |
| ---------- |:----------:| -----------:|
@foreach ($repositories as $repository)
| {{ $repository['name'] }} | {{ $repository['stargazers_count'] }} | [View Repo]({{ $repository['html_url'] }}) |
@endforeach
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
