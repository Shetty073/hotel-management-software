from django.shortcuts import render


def room_types(request):
    return render(request, 'room_types/room_types.html')


def rooms(request):
    return render(request, 'rooms/rooms.html')


def hall_types(request):
    return render(request, 'hall_types/hall_types.html')


def halls(request):
    return render(request, 'halls/halls.html')
