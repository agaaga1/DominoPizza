import Table from '@/Components/Table.jsx';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

const columns = [
    'size',
    'chef',
    'status',
]

export default function All({ auth, pizzas })
{
    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    All Pizzas
                </h2>
            }
        >
            <Head title="All Pizzas" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <Table items={pizzas} columns={columns} primary="Order Number" action="pizzas.edit" />
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    )
}