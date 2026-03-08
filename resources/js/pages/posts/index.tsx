import AppLayout from "@/layouts/app-layout";
import { Head, usePage, Link } from "@inertiajs/react";
import postRoute from "@/routes/post";

export default function Feed() {

    const { posts, auth } = usePage().props as any;

    return (
        <AppLayout>
            <Head title="Feed" />

            <div className="mx-16 flex max-w-8xl gap-16 px-6 py-12">

                {/* LEFT SIDEBAR */}
                <aside className="w-100 flex flex-col items-center">

                    <div className="w-full max-w-xs space-y-6">

                        {/* Profile */}
                        <div className="rounded-xl border border-neutral-800 bg-neutral-900 p-6 text-center">

                            <div className="mx-auto mb-4 h-20 w-20 rounded-full bg-neutral-700"></div>

                            <h2 className="text-lg font-semibold text-neutral-100">
                                {auth.user.name}
                            </h2>

                            <p className="text-sm text-neutral-400">
                                @{auth.user.username}
                            </p>

                        </div>

                        {/* Create Post */}
                        <Link
                            href={postRoute.create().url}
                            className="block w-full rounded-lg bg-blue-600 px-4 py-2 text-center text-sm font-medium text-white hover:bg-blue-700"
                        >
                            + Create Post
                        </Link>

                    </div>

                </aside>


                {/* FEED */}
                <div className="max-w-6xl flex-1 space-y-16">

                    {posts.map((item: any) => (
                        <article key={item.id} className="space-y-4">

                            <h1 className="text-3xl font-bold text-neutral-100">
                                {item.title}
                            </h1>

                            <p className="text-neutral-300 leading-relaxed break-all">
                                {item.description}
                            </p>

                            <div className="flex items-center gap-4 text-sm text-neutral-400">

                                <Link
                                    href={postRoute.show({
                                        username: item.user.username,
                                        slug: item.slug
                                    }).url}
                                    className="rounded bg-neutral-800 px-3 py-1 text-blue-400 hover:bg-neutral-700"
                                >
                                    read
                                </Link>

                                <span>by {item.user.name}</span>

                                <span>— {item.created_at}</span>

                            </div>

                        </article>
                    ))}

                </div>

            </div>

        </AppLayout>
    );
}