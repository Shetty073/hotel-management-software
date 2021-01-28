from django.shortcuts import render


def bookings(request):
    return render(request, 'bookings/bookings.html')


def booked_rooms(request):
    return render(request, 'booked_rooms/booked_rooms.html')


def booked_halls(request):
    return render(request, 'booked_halls/booked_halls.html')


def guests(request):
    return render(request, 'guests/guests.html')


def food_orders(request):
    return render(request, 'food_orders/food_orders.html')
