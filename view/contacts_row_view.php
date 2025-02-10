<tr data-contact-id="<?= $contact['contact_id'] ?>"
    data-contact-mobile="<?= $contact['contact_mobile'] ?>"
    data-contact-fullname="<?= $contact['contact_fullname'] ?>"
    data-contact-email="<?= $contact['contact_email'] ?>" 
    data-contact-company="<?= $contact['contact_company'] ?>"
    class="editable_contact"
    style="cursor: pointer;">
    <td data-col-type="contact_fullname" data-contact-id="<?= $contact['contact_id'] ?>">
        <?= $contact['contact_fullname'] ?>
    </td>
</tr>
