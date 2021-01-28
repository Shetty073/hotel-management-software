from django.db.models.signals import post_save
from django.dispatch import receiver

from .models import Payment, Invoice


@receiver(post_save, sender=Payment)
def update_invoice(sender, instance, created, **kwargs):
    if created:
        invoice = Invoice.objects.get(booking=instance.booking)
        invoice.total_amount = invoice.total_amount + instance.total_amount
        invoice.paid_amount = invoice.paid_amount + instance.paid_amount
        invoice.pending_amount = invoice.pending_amount + instance.pending_amount
        invoice.save()
