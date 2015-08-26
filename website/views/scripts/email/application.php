<?php $formName = "application_"; ?>

<table>
    <tr>
        <th colspan="2">Personal details</th>
    </tr>
    <tr>
        <th>Name: </th>
        <th><?= $this->data[$formName . 'name']; ?></th>
    </tr>
    <tr>
        <td>Email: </td>
        <td><?= $this->data[$formName . 'email']; ?></td>
    </tr>
    <tr>
        <td>Number: </td>
        <td><?= $this->data[$formName . 'number']; ?></td>
    </tr>
    <tr>
        <td>Address: </td>
        <td><?= $this->data[$formName . 'address']; ?></td>
    </tr>
    <tr>
        <td>Work Permits: </td>
        <td><?= $this->data[$formName . 'work_permits']; ?></td>
    </tr>
    <tr>
        <td>Reason for applying: </td>
        <td><?= $this->data[$formName . 'apply_reason']; ?></td>
    </tr>
    <tr>
        <td>Special experience: </td>
        <td><?= $this->data[$formName . 'special_experience']; ?></td>
    </tr>
    <tr>
        <td>Strengths: </td>
        <td><?= $this->data[$formName . 'strengths']; ?></td>
    </tr>
    <tr>
        <th colspan="2">The position</th>
    </tr>
    <tr>
        <td>Home #1: </td>
        <td><?= $this->data[$formName . 'home_name_1']; ?></td>
    </tr>
    <tr>
        <td>Position #1: </td>
        <td><?= $this->data[$formName . 'position_1']; ?></td>
    </tr>
    <tr>
        <td>Home #2: </td>
        <td><?= $this->data[$formName . 'home_name_2']; ?></td>
    </tr>
    <tr>
        <td>Position #2: </td>
        <td><?= $this->data[$formName . 'position_2']; ?></td>
    </tr>
    <tr>
        <td>Home #3: </td>
        <td><?= $this->data[$formName . 'home_name_3']; ?></td>
    </tr>
    <tr>
        <td>Position #3: </td>
        <td><?= $this->data[$formName . 'position_3']; ?></td>
    </tr>
    <tr>
        <td>Preferred shifts: </td>
        <td><?= $this->data[$formName . 'preferred_shift']; ?></td>
    </tr>
    <tr>
        <td>Preferred hours: </td>
        <td><?= $this->data[$formName . 'preferred_hours']; ?></td>
    </tr>
    <tr>
        <td>Bank positions?: </td>
        <td><?= $this->data[$formName . 'preferred_hours']; ?></td>
    </tr>
    <tr>
        <td>How did you hear about us?: </td>
        <td><?= $this->data[$formName . 'how_did_you_hear']; ?></td>
    </tr>
    <tr>
        <td>How did you hear (other): </td>
        <td><?= $this->data[$formName . 'how_did_you_hear_other']; ?></td>
    </tr>
    <tr>
        <td>Referred by: </td>
        <td><?= $this->data[$formName . 'friend_referral']; ?></td>
    </tr>
    <tr>
        <th colspan="2">Education and training</th>
    </tr>
    <tr>
        <td>NVQ L2 in Care: </td>
        <td><?= $this->data[$formName . 'qualification_one']; ?></td>
    </tr>
    <tr>
        <td>NVQ L3 in Care: </td>
        <td><?= $this->data[$formName . 'qualification_two']; ?></td>
    </tr>
    <tr>
        <td>NVQ L4 in Care </td>
        <td><?= $this->data[$formName . 'qualification_three']; ?></td>
    </tr>
    <tr>
        <td>RMA or LMCS: </td>
        <td><?= $this->data[$formName . 'qualification_four']; ?></td>
    </tr>
    <tr>
        <td>NVQ in Cleaning & Supporting Services: </td>
        <td><?= $this->data[$formName . 'qualification_five']; ?></td>
    </tr>
    <tr>
        <td>Food Hygiene Certificate: </td>
        <td><?= $this->data[$formName . 'qualification_six']; ?></td>
    </tr>
    <tr>
        <td>Other relevant qualifications: </td>
        <td><?= $this->data[$formName . 'relevant_qualifications']; ?></td>
    </tr>
    <tr>
        <td>Professional body membership details: </td>
        <td><?= $this->data[$formName . 'professional_bodies']; ?></td>
    </tr>
    <tr>
        <td>Nurse PIN and expiry: </td>
        <td><?= $this->data[$formName . 'nurse_details']; ?></td>
    </tr>
    <tr>
        <th colspan="2">Personal details (Part 2)</th>
    </tr>
    <tr>
        <td>Company: </td>
        <td><?= $this->data[$formName . 'recent_company_name']; ?></td>
    </tr>
    <tr>
        <td>Position: </td>
        <td><?= $this->data[$formName . 'recent_company_position']; ?></td>
    </tr>
    <tr>
        <td>Address: </td>
        <td><?= $this->data[$formName . 'recent_company_address']; ?></td>
    </tr>
    <tr>
        <td>Contact number: </td>
        <td><?= $this->data[$formName . 'recent_company_number']; ?></td>
    </tr>
    <tr>
        <td>Contact email: </td>
        <td><?= $this->data[$formName . 'recent_company_email']; ?></td>
    </tr>
    <tr>
        <td>Start date: </td>
        <td><?= $this->data[$formName . 'recent_company_from_date']; ?></td>
    </tr>
    <tr>
        <td>End date: </td>
        <td><?= $this->data[$formName . 'recent_company_to_date']; ?></td>
    </tr>
    <tr>
        <td>Reason for leaving: </td>
        <td><?= $this->data[$formName . 'reason_for_leaving']; ?></td>
    </tr>
    <tr>
        <td>Company: </td>
        <td><?= $this->data[$formName . 'recent_company_name_two']; ?></td>
    </tr>
    <tr>
        <td>Position: </td>
        <td><?= $this->data[$formName . 'recent_company_position_two']; ?></td>
    </tr>
    <tr>
        <td>Address: </td>
        <td><?= $this->data[$formName . 'recent_company_address_two']; ?></td>
    </tr>
    <tr>
        <td>Number: </td>
        <td><?= $this->data[$formName . 'recent_company_number_two']; ?></td>
    </tr>
    <tr>
        <td>Email: </td>
        <td><?= $this->data[$formName . 'recent_company_email_two']; ?></td>
    </tr>
    <tr>
        <td>Start date: </td>
        <td><?= $this->data[$formName . 'recent_company_from_date_two']; ?></td>
    </tr>
    <tr>
        <td>End date: </td>
        <td><?= $this->data[$formName . 'recent_company_to_date_two']; ?></td>
    </tr>
    <tr>
        <td>Reason for leaving: </td>
        <td><?= $this->data[$formName . 'reason_for_leaving_two']; ?></td>
    </tr>
    <tr>
        <th colspan="2">References</th>
    </tr>
    <tr>
        <td>Company: </td>
        <td><?= $this->data[$formName . 'references_company_one']; ?></td>
    </tr>
    <tr>
        <td>Contact: </td>
        <td><?= $this->data[$formName . 'references_contact_one']; ?></td>
    </tr>
    <tr>
        <td>Position: </td>
        <td><?= $this->data[$formName . 'references_position_one']; ?></td>
    </tr>
    <tr>
        <td>Address: </td>
        <td><?= $this->data[$formName . 'references_address_one']; ?></td>
    </tr>
    <tr>
        <td>Telephone: </td>
        <td><?= $this->data[$formName . 'references_telephone_one']; ?></td>
    </tr>
    <tr>
        <td>Email: </td>
        <td><?= $this->data[$formName . 'references_email_one']; ?></td>
    </tr>
    <tr>
        <td>Company: </td>
        <td><?= $this->data[$formName . 'references_company_two']; ?></td>
    </tr>
    <tr>
        <td>Contact: </td>
        <td><?= $this->data[$formName . 'references_contact_two']; ?></td>
    </tr>
    <tr>
        <td>Position: </td>
        <td><?= $this->data[$formName . 'references_position_two']; ?></td>
    </tr>
    <tr>
        <td>Address: </td>
        <td><?= $this->data[$formName . 'references_address_two']; ?></td>
    </tr>
    <tr>
        <td>Telephone: </td>
        <td><?= $this->data[$formName . 'references_telephone_two']; ?></td>
    </tr>
    <tr>
        <td>Email: </td>
        <td><?= $this->data[$formName . 'references_email_two']; ?></td>
    </tr>
    <tr>
        <td>Company: </td>
        <td><?= $this->data[$formName . 'references_company_three']; ?></td>
    </tr>
    <tr>
        <td>Contact: </td>
        <td><?= $this->data[$formName . 'references_contact_three']; ?></td>
    </tr>
    <tr>
        <td>Position: </td>
        <td><?= $this->data[$formName . 'references_position_three']; ?></td>
    </tr>
    <tr>
        <td>Address: </td>
        <td><?= $this->data[$formName . 'references_address_three']; ?></td>
    </tr>
    <tr>
        <td>Telephone: </td>
        <td><?= $this->data[$formName . 'references_telephone_three']; ?></td>
    </tr>
    <tr>
        <td>Email: </td>
        <td><?= $this->data[$formName . 'references_email_three']; ?></td>
    </tr>
    <tr>
        <th colspan="2">Medical information</th>
    </tr>
    <tr>
        <td>Medial problems: </td>
        <td><?= $this->data[$formName . 'medical_problem_one']; ?></td>
    </tr>
    <tr>
        <td>Medial problems: </td>
        <td><?= $this->data[$formName . 'medical_problem_two']; ?></td>
    </tr>
    <tr>
        <td>Medial problems: </td>
        <td><?= $this->data[$formName . 'medical_problem_three']; ?></td>
    </tr>
    <tr>
        <td>Medial problems: </td>
        <td><?= $this->data[$formName . 'medical_problem_four']; ?></td>
    </tr>
    <tr>
        <td>Medial problems: </td>
        <td><?= $this->data[$formName . 'medical_problem_five']; ?></td>
    </tr>
    <tr>
        <td>Medial problems: </td>
        <td><?= $this->data[$formName . 'medical_problem_six']; ?></td>
    </tr>
    <tr>
        <td>Medial problems: </td>
        <td><?= $this->data[$formName . 'medical_problem_seven']; ?></td>
    </tr>
    <tr>
        <td>Medial problems: </td>
        <td><?= $this->data[$formName . 'medical_problem_eight']; ?></td>
    </tr>
    <tr>
        <td>Medial problems: </td>
        <td><?= $this->data[$formName . 'medical_problem_nine']; ?></td>
    </tr>
    <tr>
        <td>Medial impairments: </td>
        <td><?= $this->data[$formName . 'medical_impairment_one']; ?></td>
    </tr>
    <tr>
        <td>Medial impairments: </td>
        <td><?= $this->data[$formName . 'medical_impairment_two']; ?></td>
    </tr>
    <tr>
        <td>Medial impairments: </td>
        <td><?= $this->data[$formName . 'medical_impairment_three']; ?></td>
    </tr>
    <tr>
        <td>Reasons for medical impairment: </td>
        <td><?= $this->data[$formName . 'medical_impairment_reasons']; ?></td>
    </tr>
    <tr>
        <th colspan="2">Form completion</th>
    </tr>
    <tr>
        <td>Agreement </td>
        <td><?= $this->data[$formName . 'agree_statement']; ?></td>
    </tr>
    <tr>
        <td>Signature </td>
        <td><?= $this->data[$formName . 'signature']; ?></td>
    </tr>
    <tr>
        <td>Keep on file? </td>
        <td><?= $this->data[$formName . 'keep_on_file']; ?></td>
    </tr>
</table>
