from django.shortcuts import render


def expenses(request):
    return render(request, 'expenses/expenses.html')


def payments(request):
    return render(request, 'payments/payments.html')


def invoices(request):
    return render(request, 'invoices/invoices.html')


def employees(request):
    return render(request, 'employees/employees.html')


def bank_accounts(request):
    return render(request, 'bank_accounts/bank_accounts.html')
