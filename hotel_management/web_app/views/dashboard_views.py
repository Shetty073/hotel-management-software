from django.shortcuts import render


def dashboard(request):
    return render(request, 'dashboard/dashboard.html')
