import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import post from '@/routes/post';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';
import { usePage } from '@inertiajs/react'

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Post',
        href: post.index(),
    },
];

export default function Show() {
    const { post } = usePage().props as any

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Post" />
            <div className="flex h-full flex-1 justify-center p-6">
                <article className="w-full max-w-3xl">

                    {/* Title */}
                    <h1 className="text-3xl font-bold leading-tight text-neutral-900 dark:text-neutral-100">
                        {post.title}
                    </h1>

                    {/* Author + Date */}
                    <div className="mt-3 flex items-center gap-3 text-sm text-neutral-500">
                        <div className="h-8 w-8 rounded-full bg-gray-300"></div>

                        <span className="font-medium text-neutral-700 dark:text-neutral-300">
                            {post.name}
                        </span>

                        <span>•</span>

                        <span>{post.created_at}</span>
                    </div>

                    {/* Divider */}
                    <div className="mt-6 border-t border-neutral-200 dark:border-neutral-800"></div>

                    {/* Content */}
                    <div className="prose mt-6 max-w-none dark:prose-invert">
                        <p className="text-lg leading-relaxed break-all">
                            {post.description}
                        </p>
                    </div>

                </article>
            </div>
        </AppLayout>
    );
}
