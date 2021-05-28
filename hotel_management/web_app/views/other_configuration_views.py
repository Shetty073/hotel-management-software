from django.shortcuts import render


def food_menu(request):
    return render(request, 'food_menu/food_menu.html')


def paid_services(request):
    return render(request, 'paid_services/paid_services.html')


def amenities(request):
    return render(request, 'amenities/amenities.html')


def users(request):
    return render(request, 'users/users.html')
