import Table from "@/Components/Table";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";

const columns = [
    'checkin_time',
    'checkout_time',
    'total_working_hours'
];
export default function All({auth, attendances}:{auth:any; attendances:any}){
    return(
        <Authenticated
            user = {auth.user}
        >
            <Head title ="Attendance"/>
            <Table items={attendances} columns={columns} primary="Employee Name"/>
        </Authenticated>
    );
}