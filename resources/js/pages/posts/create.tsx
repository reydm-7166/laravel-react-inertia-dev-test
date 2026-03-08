import AppLayout from "@/layouts/app-layout";
import { Head, useForm } from "@inertiajs/react";

export default function Create() {

    const { data, setData, post, processing, errors } = useForm({
        title: "",
        description: ""
    });

    const submit = (e: any) => {
        e.preventDefault();
        post("/feed/create");
    };

    return (
        <AppLayout>
            <Head title="Create Post" />

            <div className="flex justify-center p-6">
                <div className="w-full max-w-xl">

                    <h1 className="mb-6 text-2xl font-bold">
                        Create Post
                    </h1>

                    <form onSubmit={submit} className="space-y-4">

                        {/* Title */}
                        <div>
                            <label className="block text-sm font-medium">
                                Title
                            </label>

                            <input
                                type="text"
                                value={data.title}
                                onChange={(e) => setData("title", e.target.value)}
                                className="mt-1 w-full rounded-lg border p-2"
                            />

                            {errors.title && (
                                <p className="mt-1 text-sm text-red-500">
                                    {errors.title}
                                </p>
                            )}
                        </div>

                        {/* Description */}
                        <div>
                            <label className="block text-sm font-medium">
                                Description
                            </label>

                            <textarea
                                value={data.description}
                                onChange={(e) => setData("description", e.target.value)}
                                className="mt-1 w-full rounded-lg border p-2"
                                rows="5"
                                maxLength={500}
                            />

                            <div className="flex justify-between text-sm text-gray-500">
                                {errors.description && (
                                    <span className="text-red-500">
                                        {errors.description}
                                    </span>
                                )}
                                <span>
                                    {data.description.length}/500
                                </span>
                            </div>
                        </div>

                        {/* Submit */}
                        <button
                            disabled={processing}
                            className="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
                        >
                            Create Post
                        </button>

                    </form>

                </div>
            </div>
        </AppLayout>
    );
}